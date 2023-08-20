<?php

namespace App\Controller\Admin;

use App\Entity\Diet;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DietCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Diet::class;
    }

    public function configureCrud(Crud $crud) : Crud{
      return $crud
        ->setPageTitle('index', 'Dietetique - Administration des régimes')
        ->setEntityLabelInPlural('Régimes')
        ->setEntityLabelInSingular('régime');
    }

}
