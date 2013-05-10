<?php
namespace campanas;


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
//                'campanas\Model\campanasTable' =>  function($sm) {
//                    $tableGateway = $sm->get('campanasTableGateway');
//                    $table = new campanasTable($tableGateway);
//                    return $table;
//                },
//                'campanasTableGateway' => function ($sm) {
//                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
//                    $resultSetPrototype = new ResultSet();
//                    $resultSetPrototype->setArrayObjectPrototype(new campanas());
//                    return new TableGateway('anuncios', $dbAdapter, null, $resultSetPrototype);
//                },
//            ),
//        );
//    }
}