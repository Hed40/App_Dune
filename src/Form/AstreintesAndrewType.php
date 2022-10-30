<?php

namespace App\Form;

use App\Entity\AstreintesAndrew;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AstreintesAndrewType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Nom')
            ->add('Prenom')
            ->add('Date')
            ->add('Heure')
            ->add('Duree_1')
            ->add('Duree_2')
            ->add('Motif_Appel')
            ->add('Intervention')
            ->add('Motif_Intervention')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AstreintesAndrew::class,
        ]);
    }
}
