<?php

namespace src\core\Loader;

/**
 * File based array loader - for config purposes
 * @author Hubert Stanczyk <hubert.stanczyk@gmail.com>
 * @version 1.0
 */
class Loader {

    public $config;

    public static function getConfig($path) {
      if(!file_exists(BASE_PATH.DIRECTORY_SEPARATOR.$path))
          throw new \Exception('Config file not present');
      else $this->config = file_get_contents (BASE_PATH.DIRECTORY_SEPARATOR.$path);

      return $this->config;

    }
}
