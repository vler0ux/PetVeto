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
            FormEvents::PRE_SUBMIT => 'onPreSubmit',
        ];
    }

    public function onPreSubmit(FormEvent $event): void
{
    $data = $event->getData(); // tableau associatif
    $form = $event->getForm();

    if (isset($data['type']) && $data['type'] === 'Autre' && !empty($data['customAnimalType'])) {
        // Tu peux ici modifier $data pour injecter la valeur
        $data['type'] = $data['customAnimalType'];
    }

    if (isset($data['description']) && $data['description'] === 'Autre' && !empty($data['customDescription'])) {
        $data['description'] = $data['customDescription'];
    }

    if (isset($data['species']) && $data['species'] === 'Autre' && !empty($data['customSpecies'])) {
        $data['species'] = $data['customSpecies'];
    }

    $event->setData($data);
}

}
