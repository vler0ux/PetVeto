<?php

namespace App\Form\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class CareFormListener implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            FormEvents::POST_SUBMIT => 'onPostSubmit',
        ];
    }

    public function onPostSubmit(FormEvent $event): void
    {
        $care = $event->getData();
        $form = $event->getForm();

        $customCareType = $form->get('customCareType')->getData();
        $customFood = $form->get('customFood')->getData();
        $customBehaviour = $form->get('customBehaviour')->getData();

        // Type de soin : remplacement si "Autre"
        if ($care->getType()?->getName() === 'Autre' && !empty($customCareType)) {
            $newType = new \App\Entity\CareName();
            $newType->setNameTypeCare($customCareType);
            $care->setType($newType);
        }

        if ($care->getFood() === 'Autre' && !empty($customFood)) {
            $care->setFood($customFood);
        }

        if ($care->getBehaviour() === 'Autre' && !empty($customBehaviour)) {
            $care->setBehaviour($customBehaviour);
        }
    }
}
