<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use \EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureCrud(Crud $crud) : Crud{
      return $crud
        ->setPageTitle('index', 'Dietetique - Administration des utilisateurs')
        ->setEntityLabelInPlural('utilisateurs')
        ->setEntityLabelInSingular('Utilisateur');
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
              ->hideOnForm(),
            TextField::new('name'),
            TextField::new('surName'),
            TextField::new('city'),
            TextField::new('email')
              ->hideOnForm()
              ->setFormTypeOption('disabled', 'disabled'),
            ArrayField::new('roles'),
            ArrayField::new('allergenes'),
            ArrayField::new('diets')
        ];
    }
}
