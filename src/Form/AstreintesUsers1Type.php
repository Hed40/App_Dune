<?php

namespace App\Form;

use App\Entity\AstreintesUsers;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class AstreintesUsers1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class, [
                'label' => 'Prénom',
                'mapped' => false,
                'disabled' => true
            ])
            ->add('lastName', TextType::class, [
                'label' => 'Nom',
                'mapped' => false,
                'disabled' => true
            ])
            ->add('Date', DateType::class, [
                'label' => 'Date',
                'widget' => 'single_text',
                'attr' => [
                    'class' =>'form-control'
                ]
            ])
            ->add('Time', TimeType::class, [
                'label' => 'Heure',
                'widget' => 'single_text',
                'attr' => [
                    'class' =>'form-control'
                ]
            ])
            ->add('Description', TextareaType::class, [
                'label' => "Raison de l'appel",
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 500
                ]),
                'attr' => [
                    'class' => 'form-control',
                    'style' => 'resize:none',
                ]
            ])
            ->add('Duration_1', IntegerType::class, [
                'label' => "Durée de l'appel <= 2 minutes",
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('Duration_2', IntegerType::class, [
                'label' => "Durée de l'appel > 2 minutes",
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('Intervention')

            ->add('submit', SubmitType::class, [
                'label' =>"Enregistrer",
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AstreintesUsers::class,
        ]);
    }
}
