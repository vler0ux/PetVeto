<?php

namespace App\Form;

use App\Entity\Animal;
use App\Entity\Care;
use App\Entity\Veto;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use App\Form\EventListener\CareFormListener;
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
        ->add('careName', ChoiceType::class, [
            'label' => 'Nom du soin',
            'choices' => [
            'Vaccination'=>'Vaccination',
            'Vermifuge'=>'Vermifuge',
            'Consultation'=>'Consultation',
            'Antiparasitaire'=>'Antiparasitaire',
            'Bilan de santé'=>'Bilan de santé',
            'Stérilisation'=>'Stérilisation',
            'Analyse'=>'Analyse',
            ],
            'label' => 'Type de soin',
            'placeholder' => 'Choisir un type de soin',
            'required' => true,
        ])
        ->add('customCareName', TextType::class, [
            'required' => false,
            'mapped' => false,
        ])
        ->add('examDate', null, [
            'label' => 'Date de consultation',
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
        ->add('food', ChoiceType::class, [
            'label' => 'Nourriture',
            'choices' => [
                'croquettes'=>'croquettes',
                'pâtée maison'=>'pâtée maison',
                'ration mixte'=>'ration mixte',
                'B.A.R.F'=>'B.A.R.F',
                'regime médicalisé'=>'regime médicalisé',
                'autre' => 'autre',
            ],
            'placeholder' => 'Sélectionner un type de nourriture',
            'required' => false,
        ])
        ->add('customFood', TextType::class, [
            'label' => 'Autre nourriture',
            'mapped' => false,
            'required' => false,
        ])
        ->add('behaviour',ChoiceType::class, [
            'label' => 'Caratère',
            'choices' => [
                'calme'=>'calme',
                'agité(e)'=>'agité(e)',
                'peureux(se)'=>'peureux(se)',
                'agressif(ve)'=>'agressif(ve)',
                'joueur(se)'=>'joueur(se)',
                'stressé(e)'=>'stressé(e)',
                'sociable'=>'sociable',
                'dominant(e)'=>'dominant(e)',
                'autre' => 'autre',
            ],
            'placeholder' => 'Sélectionner un caractère',
            'required' => false,
        ])
        ->add('customBehaviour', TextType::class, [
            'label' => 'Autre caractère',
            'mapped' => false,
            'required' => false,
        ])
        ->add('veto', EntityType::class, [
            'class' => Veto::class,
            'choice_label' => 'fullname',
            'label' => 'Vétérinaire',
            'placeholder' => 'Sélectionner un vétérinaire',
            'required' => true,
        ])
        ->addEventSubscriber(new CareFormListener());
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Care::class,
        ]);
    }
}
