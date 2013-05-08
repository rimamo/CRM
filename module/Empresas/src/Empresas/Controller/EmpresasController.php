<?php

namespace Empresas\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class EmpresasController extends AbstractActionController {

    public function indexAction() {

        $texto = "CARLOS";
        
        return new ViewModel(array(
            'texto' => "HOLA",
            'class' => $texto
        ));
    }


}