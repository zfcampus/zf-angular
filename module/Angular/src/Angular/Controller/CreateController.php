<?php

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
        $config = $this->getServiceLocator()->get('config'); 

        if (!isset($config['zfangular'])) {
            return $this->sendError(
                'The zfangular key in your configuration file is missing'
            );
        }
        
        $zfa = $config['zfangular'];
        if (!isset($zfa['routes'])) {
            return $this->sendError(
                'The routes key of zfangular is empty in your config file'
            );
        }

        // Make a copy of the old app file
        if (file_exists('public/js/angular/app.js')) {
            copy ('public/js/angular/app.js', 'public/js/angular/app.js.old');
        }

        if (!file_exists('public/js/angular')) {
            mkdir ('public/js/angular');
        }

        // @todo Read the zfangular routes part and generate the app.js file for Angular
        file_put_contents('public/js/angular/app.js','');        
        
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
        $m->setResult($msg . PHP_EOL);
        return $m;
    }
}
