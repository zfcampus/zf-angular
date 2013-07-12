<?php
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
    'app'     => '',
    'routes' => array(
        'when' => array(array(
            'url'        => '',
            'template'   => '',
            'controller' => ''
        )),
        'otherwise' => array(
            'url' => ''
        )
    )
 );

 /**
  * You do not need to edit below this line
  */
 return array(
    'zfangular' => $settings,
 );
