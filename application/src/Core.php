<?php

use src\core\Router;
use src\core\ServiceException;

defined('BASE_PATH') or define('BASE_PATH',
       dirname(__FILE__).DIRECTORY_SEPARATOR.'..');
spl_autoload_register('Core::autoload');


/**
 * Core class for the application
 * @author Hubert Stanczyk <hubert.stanczyk@gmail.com>
 * @version 1.0
 */
class Core
{
    /**
     * Class autoloader, supporting namespaces, also Win / Unix
     * @param type $className
     * @return boolean
     */
    public static function autoload($className)
    {
        $filename = BASE_PATH.DIRECTORY_SEPARATOR.str_replace("\\", '/',
                $className).".php";

        if (file_exists($filename)) {
            include($filename);
            if (class_exists($className)) {
                return TRUE;
            }
        }
        return FALSE;
    }

    /**
     * Initialises router, detects request method
     * @return void
     */
    public static function init()
    {
        $router = new Router;
        $router->parseUrl();
        $router->setVerb();

        self::execute($router->getSegments(), $router->getVerb());
    }

    /**
     * Executes previously initialised component
     * @param array $segments
     * @param string $verb
     * @return string
     * @throws Exception
     * @throws ServiceException
     */
    public static function execute($segments, $verb)
    {

        try {
            if (empty($segments[1]))
                    throw new Exception('Service name not specified.');

            $serviceName = '\src\services\\'.ucfirst($segments[1]).'Service';

            if (!file_exists(BASE_PATH.DIRECTORY_SEPARATOR.str_replace("\\",
                        '/', $serviceName).".php") || !class_exists($serviceName))
                    throw new ServiceException('Invalid service name');

            return (new $serviceName)->run($verb, isset($segments[2]) ? $segments[2] : null);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}