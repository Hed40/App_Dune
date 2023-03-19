<?php

namespace App\Form;

use App\Entity\Intervention;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InterventionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Firstname', TextType::class, [
                'label' => 'Prénom',
                'mapped' => false,
                'disabled' => true
            ])
            ->add('Lastname', TextType::class, [
                'label' => 'Nom',
                'mapped' => false,
                'disabled' => true
            ])
            ->add('Date', DateType::class, [
                'label' => 'Date',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('Action', TextareaType::class, [
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
            ->add('Resultat', TextareaType::class, [
                'label' => "Résultat de l'intervention",
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 500
                ]),
                'attr' => [
                    'class' => 'form-control',
                    'style' => 'resize:none',
                ]
            ])

            ->add('Horaire_1', TimeType::class, [
                'label'=> 'Horaire de début',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('Horaire_2', TimeType::class, [
                'label'=> 'Horaire de fin',
                'widget' => 'single_text',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('Duration', IntegerType::class, [
                'label' => "Durée de l'intervention",
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' =>"Enregistrer",
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Intervention::class,
        ]);
    }
}

