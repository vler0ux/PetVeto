<?php

namespace App\Form;

use App\Entity\Veto;
use Symfony\Component\Form\Extension\Core\Type\TextType; 
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VetoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname',TextType::class,[
                'label' => 'Prénom du vétérinaire'])
            ->add('lastname',TextType::class,[
                'label' => 'Nom du vétérinaire'])
            ->add('email')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Veto::class,
        ]);
    }
}
