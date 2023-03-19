<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use PhpParser\Node\Expr\Cast\Array_;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [

            
            TextField::new('lastname'),
            TextField::new('firstname'),
            TextField::new('email'),
            TextField::new('password'),
            TextField::new('Categorie'),
            TextField::new('Grade'),
            TextField::new('Service'),
            TextField::new('Poste'),
            TextField::new('heures'),
            TextField::new('ARTT'),
            TextField::new('CP'),
        ];
    }
    
}
