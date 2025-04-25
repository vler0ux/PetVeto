<?php

namespace App\Form\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class AnimalFormListener implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            FormEvents::POST_SUBMIT => 'onPostSubmit',
        ];
    }

    public function onPostSubmit(FormEvent $event): void
    {
        $animal = $event->getData();
        $form = $event->getForm();

        $customDescription = $form->get('customDescription')->getData();
        $customSpecies = $form->get('customSpecies')->getData();

        if ($animal->getDescription() === 'Autre' && !empty($customDescription)) {
            $animal->setDescription($customDescription);
        }

        if ($animal->getSpecies() === 'Autre' && !empty($customSpecies)) {
            $animal->setSpecies($customSpecies);
        }
    }
}
