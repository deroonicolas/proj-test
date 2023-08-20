<?php

namespace App\Controller\Admin;

use App\Entity\Allergene;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AllergeneCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Allergene::class;
    }

    public function configureCrud(Crud $crud) : Crud{
      return $crud
        ->setPageTitle('index', 'Dietetique - Administration des allergènes')
        ->setEntityLabelInPlural('Allergènes')
        ->setEntityLabelInSingular('Allergène');
    }
}
