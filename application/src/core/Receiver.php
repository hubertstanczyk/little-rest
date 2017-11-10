<?php

namespace src\core;

/**
 * Class to handle body of the request
 * @author Hubert Stanczyk <hubert.stanczyk@gmail.com>
 * @version 1.0
 * @todo provide adapters for other formats
 */
class Receiver {

    public $body;
    public $bodyArray;

    /**
     * Method for decoding the request
     * @return array / boolean
     */
    public function __process()
    {
      if(!$this->bodyArray = json_decode($this->body))
          return false;
      else
          return $this->bodyArray();
    }
}