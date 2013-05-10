<?php
namespace Usuarios;


class Module
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
    
//        public function getServiceConfig()
//    {
//        return array(
//            'factories' => array(
//                'Usuarios\Model\UsuariosTable' =>  function($sm) {
//                    $tableGateway = $sm->get('UsuariosTableGateway');
//                    $table = new UsuariosTable($tableGateway);
//                    return $table;
//                },
//                'UsuariosTableGateway' => function ($sm) {
//                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
//                    $resultSetPrototype = new ResultSet();
//                    $resultSetPrototype->setArrayObjectPrototype(new Usuarios());
//                    return new TableGateway('anuncios', $dbAdapter, null, $resultSetPrototype);
//                },
//            ),
//        );
//    }
}