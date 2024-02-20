<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PeopleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom :',
                'label_attr' => ['class' => ''],
                'required' => 'true'
            ])
            ->add('surname', TextType::class, [
                'label' => 'Prénom :',
                'label_attr' => ['class' => ''],
                'required' => 'true'
            ])
            ->add('date_birth', DateType::class, [
                'label' => 'Date de naissance :',
                'label_attr' => ['class' => ''],
                'required' => 'true'
            ])
            ->add('place_birth', TextType::class, [
                'label' => 'Lieu de naissance :',
                'label_attr' => ['class' => ''],
                'required' => 'true'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
