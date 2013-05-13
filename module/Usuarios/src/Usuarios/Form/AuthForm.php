<?php

namespace Usuarios\Form;

use Zend\Form\Form;
use Zend\Form\Element;

class AuthForm extends Form {

    public function __construct($name = null) {
        parent::__construct('auth');
        $this->setAttribute('method', 'post');

        $this->add(array(
            'name' => 'email',
            'attributes' => array(
                'type' => 'text',
            ),
            'options' => array(
                'label' => 'Correo electronico',
            ),
        ));

        $this->add(array(
            'name' => 'password',
            'attributes' => array(
                'type' => 'password',
            ),
            'options' => array(
                'label' => 'Password',
            ),
        ));
        $element = new Element\Checkbox('remember');
        $element->setUseHiddenElement(true)
                ->setLabel('Recordar')
                ->setUncheckedValue('0')
                ->setCheckedValue('1');

        
        $this->add($element);
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Acceder',
                'id' => 'submitbutton',
            ),
        ));
    }

}
