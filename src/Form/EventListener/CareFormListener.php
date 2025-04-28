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
            FormEvents::PRE_SUBMIT => 'onPreSubmit',
        ];
    }

    public function onPreSubmit(FormEvent $event): void
{
    $data = $event->getData();
    $form = $event->getForm();

    if (isset($data['careName']) && $data['careName'] === 'Autre' && !empty($data['customCareName'])) {
        $data['careName'] = $data['customCareName'];
    }

    if (isset($data['food']) && $data['food'] === 'Autre' && !empty($data['customFood'])) {
        $data['food'] = $data['customFood'];
    }

    if (isset($data['behaviour']) && $data['behaviour'] === 'Autre' && !empty($data['customBehaviour'])) {
        $data['behaviour'] = $data['customBehaviour'];
    }

    $event->setData($data);
}

}
