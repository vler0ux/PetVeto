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
        ->add('description', TextareaType::class, [
            'label' => 'Description',
            'attr' => ['placeholder' => 'Décrivez l\'animal'],
        ])
        ->add('save', SubmitType::class, [
            'label' => 'Enregistrer',
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Animal::class,
        ]);
    }
}
