<?php
namespace Angular;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\ModuleManager\Feature\ConsoleBannerProviderInterface;
use Zend\Console\Adapter\AdapterInterface as Console;
use Zend\Console\Request as ConsoleRequest;

class Module implements ConsoleBannerProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function onBootstrap(MvcEvent $e)
    {
        $application         = $e->getApplication();
        $eventManager        = $application->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

        
        $sm      = $application->getServiceManager();
        $config  = $sm->get('config');
        $request = $sm->get('request');

        if (!$request instanceOf ConsoleRequest && isset($config['zfangular'])) {
            $zfa        = $config['zfangular'];
            $headScript = $sm->get('viewhelpermanager')->get('headScript');
            if (isset($zfa['cdn']) && isset($zfa['cdn_url'])) {
                if ($zfa['cdn']) {
                    $headScript->appendFile($zfa['cdn_url']);
                }
            }
            if (isset($zfa['file']) && !empty($zfa['file'])) {
                if (!file_exists("public/js/{$zfa['file']}")) {
                    // @todo: manage this path in the vendor folder
                    if (!copy("module/Angular/public/js/{$zfa['file']}", "public/js/{$zfa['file']}")) {
                        throw new Exception\RuntimeException(
                            'I cannot copy the AngularJs file in the public/js folder'
                        );
                    }
                }
                $basePath = $sm->get('viewhelpermanager')->get('basePath');
                $headScript->appendFile($basePath() . "/js/{$zfa['file']}");
            }
        }
    }

    public function getConsoleBanner(Console $console){
        return "This is ZFAngular beta.";
    }
}
