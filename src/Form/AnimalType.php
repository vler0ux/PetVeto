<?php

namespace App\Form;

use App\Entity\Animal;
use App\Form\EventListener\AnimalFormListener;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class AnimalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('name', TextType::class, [
            'label' => 'Nom de l\'animal',
            'attr' => ['placeholder' => 'Entrez le nom de l\'animal'],
        ])
        ->add('species', ChoiceType::class, [
            'label' => 'Espèce',
            'choices' => [
                'Chien' => 'Chien',
                'Chat' => 'Chat',
                'Cheval' => 'Cheval',
                'Cochon d’Inde' => 'Cochon d’Inde',
                'Furet' => 'Furet',
                'Hamster' => 'Hamster',
                'Lapin' => 'Lapin',
                'Perroquet' => 'Perroquet',
                'Rat' => 'Rat',
                'Serpent' => 'Serpent',
                'Souris' => 'Souris',
                'Tortue' => 'Tortue',
                'Autre (à préciser en dessous)' => 'Autre',
            ],
                'placeholder' => 'Sélectionner l’espèce',
                'required' => true,
        ])
        ->add('customSpecies', TextType::class, [
            'label' => 'Autre espèce non listée',
            'required' => false,
            'mapped' => false,
        ])
        ->add('birthday', DateType::class, [
            'label' => 'Date de naissance',
            'widget' => 'single_text',
        ])
        ->add('weight', NumberType::class, [
            'label' => 'Poids (kg)',
            'required' => false,
            'scale' => 2,
            'attr' => ['step' => '0.01'],
        ])
        ->add('description', ChoiceType::class, [
            'label' => 'Description de l’animal',
            'choices' => [
                'Animal affectueux et joueur'=>'Animal affectueux et joueur',
                'A besoin d’un régime alimentaire spécial'=>'A besoin d’un régime alimentaire spécial',
                'Sensible au stress, préfère les environnements calmes'=>'Sensible au stress, préfère les environnements calmes',
                'Très énergique, adore courir'=>'Très énergique, adore courir',
                'Sociable avec les autres animaux'=>'Sociable avec les autres animaux',
                'Autre (à préciser en dessous)' => 'Autre',
            ],
            'placeholder' => 'Sélectionner une description',
            'required' => false,
        ])
        ->add('customDescription', TextType::class, [
            'label' => 'Autre description non listée',
            'required' => false,
            'mapped' => false,
        ])
        ->addEventSubscriber(new AnimalFormListener());
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Animal::class,
        ]);
    }
}
