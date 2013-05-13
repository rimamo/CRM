<?php

namespace Usuarios\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Usuarios\Form\AuthForm as AuthForm;
use Zend\View\Model\ViewModel;

class AuthController extends AbstractActionController {

    protected $form;
    protected $storage;
    protected $authservice;

    public function getAuthService() {
        if (!$this->authservice) {
            $this->authservice = $this->getServiceLocator()
                    ->get('AuthService');
        }

        return $this->authservice;
    }

    public function getSessionStorage() {
        if (!$this->storage) {
            $this->storage = $this->getServiceLocator()
                    ->get('Usuarios\Model\AuthStorage');
        }

        return $this->storage;
    }

    public function getForm() {
        if (!$this->form) {
            $this->form = new AuthForm();
        }

        return $this->form;
    }

    public function loginAction() {
        if ($this->getAuthService()->hasIdentity()) {
            return $this->redirect()->toRoute('usuarios/success');
        }

        $form = $this->getForm();

        return array(
            'form' => $form,
            'messages' => $this->flashmessenger()->getMessages()
        );
    }

    public function authenticateAction() {
        $form = $this->getForm();
        $redirect = 'usuarios/login';

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                //check authentication...
                $this->getAuthService()->getAdapter()
                        ->setIdentity($request->getPost('email'))
                        ->setCredential($request->getPost('password'));

                $result = $this->getAuthService()->authenticate();
                foreach ($result->getMessages() as $message) {
                    //save message temporary into flashmessenger
                    $this->flashmessenger()->addMessage($message);
                }

                if ($result->isValid()) {
                    $redirect = 'usuarios/success';
                    //check if it has rememberMe :
                    if ($request->getPost('remember') == 1) {
                        $this->getSessionStorage()
                                ->setRememberMe(1);
                        //set storage again 
                        $this->getAuthService()->setStorage($this->getSessionStorage());
                    }
                    $this->getAuthService()->getStorage()->write($request->getPost('email'));

                }
            }
        }

        return $this->redirect()->toRoute($redirect);
    }

    public function logoutAction() {
        $this->getSessionStorage()->forgetMe();
        $this->getAuthService()->clearIdentity();

        $this->flashmessenger()->addMessage("Sesión Finalizada! ");
        return $this->redirect()->toRoute('usuarios/login');
    }

}