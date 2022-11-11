<?php

namespace App\Form;

use App\Entity\AstreintesUsers;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class AstreintesUsersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class)
            ->add('prenom', TextType::class)
            ->add('Date', DateType::class)
            ->add('Heure', TimeType::class)
            ->add('Duree_1', IntegerType::class, [
                'label' => "Durée de l'appel <= 2 minutes "
            ])
            ->add('Duree_2', IntegerType::class, [
                'label' => "Durée de l'appel > 2 minutes "
            ])
            ->add('Motif_Appel', TextareaType::class, [
                'label' => "Raison de l'appel ",
                'constraints' => new Length([
                    'min' => 2,
                    'max' => 200
                ])
            ])
            ->add('Intervention')
            ->add('Motif_Intervention');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AstreintesUsers::class,
        ]);
    }
}
