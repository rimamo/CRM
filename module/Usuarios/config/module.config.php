<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'Usuarios\Controller\Usuarios' => 'Usuarios\Controller\UsuariosController',
            'Usuarios\Controller\Auth' => 'Usuarios\Controller\AuthController',
            'Usuarios\Controller\Success' => 'Usuarios\Controller\SuccessController'
        ),
    ),
    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'usuarios' => array(
                'type' => 'Literal',
                'priority' => 1000,
                'options' => array(
                    'route' => '/usuarios',
                    'defaults' => array(
                        'controller' => 'Usuarios\Controller\Usuarios',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'login' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/login',
                            'defaults' => array(
                                'controller' => 'Usuarios\Controller\Auth',
                                'action' => 'login',
                            ),
                        ),
                    ),
                    'authenticate' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/authenticate',
                            'defaults' => array(
                                'controller' => 'Usuarios\Controller\Auth',
                                'action' => 'authenticate',
                            ),
                        ),
                    ),
                    'logout' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/logout',
                            'defaults' => array(
                                'controller' => 'Usuarios\Controller\Auth',
                                'action' => 'logout',
                            ),
                        ),
                    ),
                    'success' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/success',
                            'defaults' => array(
                                'controller' => 'Usuarios\Controller\Success',
                                'action' => 'index',
                            ),
                        ),
                    ),
                    'changepassword' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/change-password',
                            'defaults' => array(
                                'controller' => 'zfcuser',
                                'action' => 'changepassword',
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(
                            'query' => array(
                                'type' => 'Query',
                            ),
                        ),
                    ),
                    'changeemail' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/change-email',
                            'defaults' => array(
                                'controller' => 'zfcuser',
                                'action' => 'changeemail',
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(
                            'query' => array(
                                'type' => 'Query',
                            ),
                        ),
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
