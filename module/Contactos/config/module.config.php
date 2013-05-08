<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Contactos\Controller\Contactos' => 'Contactos\Controller\ContactosController',
        ),
    ),

    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'contactos' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/contactos[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Contactos\Controller\Contactos',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'Contactos' => __DIR__ . '/../view',
        ),
    )
);