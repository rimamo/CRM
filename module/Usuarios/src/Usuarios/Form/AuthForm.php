<?php

namespace Usuarios\Form;
use Zend\Form\Form;

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
        $this->add(array(
            'name' => 'remember',
            'attributes' => array(
                'type' => 'checkbox',
            ),
            'options' => array(
                'label' => 'Recordar',
            ),
        ));

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Acc',
                'id' => 'submitbutton',
            ),
        ));
    }

}
