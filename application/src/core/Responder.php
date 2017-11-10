<?php

namespace src\core;

/**
 * Custom class to handle app level responses
 * @author Hubert Stanczyk <hubert.stanczyk@gmail.com>
 * @version 1.0
 * @todo parametrize the output format
 */
class Responder{
   /**
    * Method to return JSON message for API
    * @param string $status
    * @param string $message
    * @return string
    */
    public static function returnMessage($status, $message){
     echo json_encode(array('response'=>$status, 'body'=>$message));
    }
}
