<?php

namespace src\core;

/**
 * Router class
 * @author Hubert Stanczyk <hubert.stanczyk@gmail.com>
 * @version 1.0
 */
class Router
{
    public $requestUrl;
    private $_verb;
    private $_segments = [];

    public function __construct()
    {
        $this->requestUrl = $url = rtrim($_SERVER['REQUEST_URI'],"/");
    }

    /**
     * Splits the path by DIRECTORY_SEPARATOR and assigns to an array
     * @return array
     */
    public function parseUrl()
    {
        $this->_segments = explode(DIRECTORY_SEPARATOR, $this->requestUrl);
        return $this->_segments;
    }

    /**
     * Segments getter
     * @return array
     */
    public function getSegments()
    {
        return $this->_segments;
    }

    /**
     * Sets HTTP verb after a quick validation
     * @return void
     */
    public function setVerb()
    {
        $this->_verb = in_array($_SERVER['REQUEST_METHOD'], array('PUT', 'GET', 'POST', 'DELETE', 'OPTIONS', 'HEAD')) ? $_SERVER['REQUEST_METHOD'] : null;
    }

    /**
     * Verb getter
     * @return string
     */
    public function getVerb()
    {
        return $this->_verb;
    }
}