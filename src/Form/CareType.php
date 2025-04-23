<?php

namespace App\Form;

use App\Entity\Animal;
use App\Entity\Care;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CareType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('treatment', null, [
            'label' => 'Traitement',
        ])
        ->add('examDate', null, [
            'label' => 'Date de consultation',
            'required' => true,
        ])
        ->add('vaccinationDate', null, [
            'label' => 'Date de vaccination',
            'required' => true,
        ])
        ->add('weight', null, [
            'label' => 'Poids (kg)',
        ])
        ->add('food', null, [
            'label' => 'Alimentation',
        ])
        ->add('behaviour', null, [
            'label' => 'Comportement',
        ])
        ->add('animal', EntityType::class, [
            'class' => Animal::class,
            'choice_label' => function ($animal) {
                return sprintf('N°%d - %s', $animal->getId(), $animal->getName());
            },
            'label' => 'Animal concerné',
            'placeholder' => 'Sélectionner un animal',
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Care::class,
        ]);
    }
}
