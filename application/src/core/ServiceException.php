<?php

namespace src\core;

/**
 * Custom class to handle app level exceptions
 * @author Hubert Stanczyk <hubert.stanczyk@gmail.com>
 * @version 1.0
 */
class ServiceException extends \Exception
{

    public function __construct($message, Exception $previous = null) {

        parent::__construct(self::formatMessage($message), $previous);
    }

    /**
     * Method echoing the formatted message
     * @param string $message
     * @return void
     */
    public static function formatMessage($message) {

        echo  Responder::returnMessage('error', $message);
    }
}