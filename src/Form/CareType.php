<?php

namespace App\Form;

use App\Entity\Animal;
use App\Entity\Care;
use App\Entity\Veto;
use App\Entity\CareName;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class CareType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('animal', EntityType::class, [
            'class' => Animal::class,
            'choice_label' => function ($animal) {
                return sprintf('N°%d - %s', $animal->getId(), $animal->getName());
            },
            'label' => 'Animal concerné',
            'placeholder' => 'Sélectionner un animal',
        ])
        ->add('treatment', null, [
            'label' => 'Traitement',
        ])
        ->add('examDate', null, [
            'label' => 'Date de consultation',
            'required' => true,
        ])       
        ->add('careName', EntityType::class, [
            'class' => CareName::class,
            'choice_label' => 'name',
            'label' => 'Type de soin',
            'placeholder' => 'Choisir un type de soin',
            'required' => true,
        ])
        ->add('vaccinationDate', DateType::class, [
            'label' => 'Date de vaccination',
            'required' => false,
            'widget' => 'single_text',
            'html5' => true,
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
        ->add('type', ChoiceType::class, [
            'label' => 'Type de soin',
            'choices' => [
                'Vaccination' => 'vaccination',
                'Vermifuge' => 'vermifuge',
                'Consultation' => 'consultation',
                'Bilan de santé' => 'bilan',
            ],
            'placeholder' => 'Choisir un type de soin',
            'required' => true,
        ])
        ->add('veto', EntityType::class, [
            'class' => Veto::class,
            'choice_label' => 'fullname',        
            'label' => 'Vétérinaire',
            'placeholder' => 'Sélectionner un vétérinaire',
            'required' => true,
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Care::class,
        ]);
    }
}
