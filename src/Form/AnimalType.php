<?php

namespace App\Form;

use App\Entity\Animal;
use App\Entity\Owner;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType; 
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;


class AnimalType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('name', TextType::class, [
            'label' => 'Nom de l\'animal',
            'attr' => ['placeholder' => 'Entrez le nom de l\'animal'],
        ])
        ->add('species', TextType::class, [
            'label' => 'Espèce',
            'attr' => ['placeholder' => 'Entrez l\'espèce de l\'animal'],
        ])
        ->add('birthday', DateType::class, [
            'label' => 'Date de naissance',
            'widget' => 'single_text',
        ])
        ->add('vaccination', TextType::class, [
            'label' => 'Vaccination',
            'attr' => ['placeholder' => 'Entrez le statut de vaccination'],
        ])
        ->add('weight', NumberType::class, [
            'label' => 'Poids (kg)',
            'required' => false,
            'scale' => 2,
            'attr' => ['step' => '0.01'],
        ])
        ->add('description', TextareaType::class, [
            'label' => 'Description',
            'attr' => ['placeholder' => 'Décrivez l\'animal'],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Animal::class,
        ]);
    }
}
