<?php

namespace Usuarios\Form;

use Zend\Form\Form;

class UsuariosForm extends Form {

    public function __construct($name = null) {
        // we want to ignore the name passed
        parent::__construct('usuarios');
        $this->setAttribute('method', 'post');
        $this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type' => 'hidden',
            ),
        ));
        $this->add(array(
            'name' => 'nombre',
            'attributes' => array(
                'type' => 'text',
            ),
            'options' => array(
                'label' => 'Nombre',
            ),
        ));
        $this->add(array(
            'name' => 'apellidos',
            'attributes' => array(
                'type' => 'text',
            ),
            'options' => array(
                'label' => 'Apellidos',
            ),
        ));


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
            'name' => 'role',
            'attributes' => array(
                'type' => 'text',
            ),
            'options' => array(
                'label' => 'Rol',
            ),
        ));
        $this->add(array(
            'name' => 'password',
            'attributes' => array(
                'type' => 'text',
            ),
            'options' => array(
                'label' => 'Password',
            ),
        ));
        $this->add(array(
            'name' => 'estado',
            'attributes' => array(
                'type' => 'text',
            ),
            'options' => array(
                'label' => 'Estado',
            ),
        ));

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Go',
                'id' => 'submitbutton',
            ),
        ));
    }

}