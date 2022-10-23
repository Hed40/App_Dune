<?php

namespace App\Controller\Admin;

use App\Entity\AstreintesMatylde;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;


class AstreintesMatyldeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AstreintesMatylde::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('Prenom'),
            TextField::new('Nom'),
            DateField::new('Date'),
            TimeField::new('Heure'),
            NumberField::new('Duree_1'),
            NumberField::new('Duree_2'),
            TextField::new('Motif_Appel'),
            BooleanField::new('Intervention')
            ->renderAsSwitch(false),
            TextField::new('Motif_Intervention'),
        ];
    }
}
