<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'campanas\Controller\campanas' => 'campanas\Controller\campanasController',
        ),
    ),

    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'campanas' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/campanas[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'campanas\Controller\campanas',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'campanas' => __DIR__ . '/../view',
        ),
    )
);