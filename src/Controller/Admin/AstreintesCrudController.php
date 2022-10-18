<?php

namespace App\Controller\Admin;

use App\Entity\Astreintes;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;


class AstreintesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Astreintes::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('Prenom'),
            TextField::new('Nom'),
            DateTimeField::new('Date'),
            TimeField::new('Heure'),
            NumberField::new('Duree_1'),
            NumberField::new('Duree_2'),
            TextField::new('Motif_Appel'),
            BooleanField::new('Intervention'),
            TextField::new('Motif_Intervention'),
        ];
    }
}
