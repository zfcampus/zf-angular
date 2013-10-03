<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2013 Zend Technologies USA Inc. (http://www.zend.com)
 */

/**
 * ZfAngular Configuration
 *
 * If you have a ./config/autoload/ directory set up for your project, you can
 * drop this config file in it and change the values as you wish.
 */

 $settings = array(
    'cdn'     => false,
    'cdn_url' => 'https://ajax.googleapis.com/ajax/libs/angularjs/1.0.7/angular.min.js',
    'file'    => '',
    'app'     => 'afui',
    'routes' => array(
        'when' => array(
            '/welcome' => array(
                'template'   => '/partial/welcome.html',
                'controller' => 'WelcomeController'
            ),
            '/screen-setup-1' => array(
                'template'   => '/partial/screen-setup-1.html',
                'controller' => 'ScreenController'
            ),
            '/screen-setup-2a' => array(
                'template'   => '/partial/screen-setup-2a-html',
                'controller' => 'ScreenController'
            ),
            '/screen-setup-2b' => array(
                'template'   => '/partial/screen-setup-2b.html',
                'controller' => 'ScreenController'
            ),
            '/screen-develop-1' => array(
                'template'   => '/partial/screen-develop-1.html',
                'controller' => 'ScreenController'
            ),
            '/screen-develop-2a' => array(
                'template'   => '/partial/screen-develop-2a.html',
                'controller' => 'ScreenController'
            ),
            '/screen-develop-2b' => array(
                'template'   => '/partial/screen-develop-2b.html',
                'controller' => 'ResourceCrudController'
            )
        ),
        'otherwise' => array(
            'redirectTo' => '/welcome'
        )
    )
 );

 /**
  * You do not need to edit below this line
  */
 return array(
    'zfangular' => $settings,
 );
