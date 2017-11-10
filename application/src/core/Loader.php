<?php

namespace src\core;

/**
 * File based array loader - for config purposes
 * @author Hubert Stanczyk <hubert.stanczyk@gmail.com>
 * @version 1.0
 */
class Loader {

    static $_instance;
    static $config;
    
    /**
     * Singleton pattern
     * @return Loader
     */
    public static function getInstance(){
      if(!self::$_instance)
        self::$_instance = new Loader();
      return self::$_instance;
    }

    public static function getConfig($path = CONFIG_PATH) {
        if(!file_exists($path))
          throw new \Exception('Config file not present');
      else self::$config = include($path);

      return self::$config;

    }
}
