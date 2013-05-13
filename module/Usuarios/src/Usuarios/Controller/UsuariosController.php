<?php

namespace Usuarios\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Usuarios\Model\Usuarios;          // <-- Add this import
use Usuarios\Form\UsuariosForm;
use Zend\Authentication\Adapter\DbTable as AuthAdapter;

class UsuariosController extends AbstractActionController {

    protected $usuariosTable;

    public function indexAction() {
        return new ViewModel(array(
            'usuarios' => $this->getUsuariosTable()->fetchAll(),
        ));
    }

    public function addAction() {
        $form = new UsuariosForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();
        if ($request->isPost()) {
            $usuario = new Usuarios();
            $form->setInputFilter($usuario->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {


                $usuario->exchangeArray($form->getData());
                $this->getUsuariosTable()->saveUsuarios($usuario);

                // Redirect to list of usuarios
                return $this->redirect()->toRoute('usuarios');
            }
        }
        return array('form' => $form);
    }

    public function editAction() {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('usuarios', array(
                        'action' => 'add'
            ));
        }

        // Get the Usuarios with the specified id.  An exception is thrown
        // if it cannot be found, in which case go to the index page.
        try {
            $usuarios = $this->getUsuariosTable()->getUsuarios($id);
        } catch (\Exception $ex) {
            return $this->redirect()->toRoute('usuarios', array(
                        'action' => 'index'
            ));
        }

        $form = new UsuariosForm();
        $form->bind($usuarios);
        $form->get('submit')->setAttribute('value', 'Edit');

        $request = $this->getRequest();
        if ($request->isPost()) {

            $form->setInputFilter($usuarios->getInputFilter());


            $form->setData($request->getPost());

            if ($form->isValid()) {

                $this->getUsuariosTable()->saveUsuarios($form->getData());

                // Redirect to list of usuarioss
                return $this->redirect()->toRoute('usuarios');
            }
        }

        return array(
            'id' => $id,
            'form' => $form,
            'mensajes' => $form->getMessages()
        );
    }

    public function deleteAction() {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('usuarios');
        }

        $request = $this->getRequest();
        if ($request->isPost()) {
            $del = $request->getPost('del', 'No');

            if ($del == 'Si') {
                $id = (int) $request->getPost('id');
                $this->getUsuariosTable()->deleteUsuarios($id);
            }

            // Redirect to list of usuarioss
            return $this->redirect()->toRoute('usuarios');
        }

        return array(
            'id' => $id,
            'usuarios' => $this->getUsuariosTable()->getUsuarios($id)
        );
    }

    public function getUsuariosTable() {
        if (!$this->usuariosTable) {
            $sm = $this->getServiceLocator();
            $this->usuariosTable = $sm->get('Usuarios\Model\UsuariosTable');
        }
        return $this->usuariosTable;
    }


}