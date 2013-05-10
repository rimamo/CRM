<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Usuarios\Controller\Usuarios' => 'Usuarios\Controller\UsuariosController',
        ),
    ),

    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'usuarios' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/usuarios[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Usuarios\Controller\Usuarios',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'usuarios' => __DIR__ . '/../view',
        ),
    ),
);