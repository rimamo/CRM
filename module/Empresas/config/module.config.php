<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Empresas\Controller\Empresas' => 'Empresas\Controller\EmpresasController',
        ),
    ),

    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'empresas' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/empresas[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Empresas\Controller\Empresas',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'empresas' => __DIR__ . '/../view',
        ),
    )
);