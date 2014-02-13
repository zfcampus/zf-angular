<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2014 Zend Technologies USA Inc. (http://www.zend.com)
 */

namespace Angular\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\ConsoleModel;
use Zend\Console\ColorInterface as Color;

class CreateController extends AbstractActionController
{

    public function CreateAppAction()
    {
        $console = $this->getServiceLocator()->get('console');      
        $config  = $this->getServiceLocator()->get('config'); 

        if (!isset($config['zfangular'])) {
            return $this->sendError(
                'zfangular key missing in your configuration file'
            );
        }
        
        $zfa = $config['zfangular'];
        if (!isset($zfa['routes'])) {
            return $this->sendError(
                'no Angular routes specified (routes) in your config file'
            );
        }

        if (empty($zfa['app'])) {
            return $this->sendError(
                'the Angular application name (app) is empty in your config file'
            );
        }

        // Make a copy of the old app file
        if (file_exists('public/js/angular/app.js')) {
            copy ('public/js/angular/app.js', 'public/js/angular/app.js.old');
        }

        if (!file_exists('public/js/angular')) {
            mkdir ('public/js/angular');
        }

        $js = '';
        if (isset($zfa['app'])) {
            $js .= "'use strict';\n";
            $js .= "// Declare app level module which depends on filters, and services\n";
            $js .= "angular.module('{$zfa['app']}', ['{$zfa['app']}.controllers']).\n";
            $js .= "\t" . 'config([\'$routeProvider\', \'$locationProvider\', function($routeProvider, $locationProvider) {' . "\n";
            $js .= "\t" . '$locationProvider.html5Mode(true);' . "\n";
            $js .= $this->getApp($zfa['routes']);
            $js .= "\t" . '}]);' . "\n";
        }

        file_put_contents('public/js/angular/app.js', $js);        
        
        $console->writeLine("Angular App generated in public/js/angular/app.js");
    }

    /**
     * Send an error message to the console
     *
     * @param  string $msg
     * @return ConsoleModel
     */
    protected function sendError($msg)
    {
        $m = new ConsoleModel();
        $m->setErrorLevel(2);
        $m->setResult('ERROR: ' . $msg . PHP_EOL);
        return $m;
    }

    protected function getApp($config)
    {
        if (empty($config) || !is_array($config)) {
            return false;
        }
        $result = '';
        if (isset($config['when'])) {
            foreach ($config['when'] as $url => $value) {
                $result .= "\t\t" . '$routeProvider.when(\''. $url .
                    '\', {templateUrl: \''. $value['template'] .
                    '\', controller: \''. $value['controller'] . '\'});'. "\n";
            }
        }
        if (isset($config['otherwise'])) {
            $otherwise = $config['otherwise'];
            if (isset($otherwise['redirectTo'])) {
                $result .= "\t\t" . '$routeProvider.otherwise({redirectTo: \'' .
                    $otherwise['redirectTo'] . '\'});' . "\n";
            }
        }
        return $result;
    }


}
