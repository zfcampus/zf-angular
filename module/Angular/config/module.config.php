<?php
return array(

    'controllers' => array(
        'invokables' => array(
            'Angular\Controller\Create' => 'Angular\Controller\CreateController'
        ),
    ),

    'console' => array(
        'router' => array(
            'routes' => array(
                'zfangular-create-app' => array(
                    'options' => array(
                        'route'    => 'create app',
                        'defaults' => array(
                            'controller' => 'Angular\Controller\Create',
                            'action'     => 'create-app',
                        ),
                    ),
                ),
            ),
        ),
    ),

);
