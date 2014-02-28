<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2014 Zend Technologies USA Inc. (http://www.zend.com)
 */

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
