<?php

namespace src\services;

use src\core\Responder;
use src\models\Games;

/**
 * Custom class to handle Games items
 * @author Hubert Stanczyk <hubert.stanczyk@gmail.com>
 * @version 1.0
 */
class GamesService extends AbstractService
{
    private $_supportedOps = array('GET', 'POST', 'PUT', 'DELETE');

    public function getOne($id)
    {
        $items = Games::getOne($id);
        return Responder::returnMessage($items ? array('ok', $items) : array('error',
                'no matching items'));
    }

    public function getMany()
    {
        $items = Games::getMany();
        if ($items)
          return Responder::returnMessage('ok', $items);
        else
          return Responder::returnMessage('error', 'no matching items');
    }

    public function deleteOne($id)
    {
        $item = Games::deleteOne($id);
        if ($item)
          return Responder::returnMessage('ok', $item);
        else
          return Responder::returnMessage('error', 'could not delete the specified item');
    }

    public function createOne()
    {
        $item = Games::createOne();
        if ($item)
          return Responder::returnMessage('ok', $item);
        else
          return Responder::returnMessage('error', 'could not create the specified item');
    }

    public function updateOne($id)
    {
        $item = Games::updateOne($id);
        if ($item)
          return Responder::returnMessage('ok', $item);
        else
          return Responder::returnMessage('error', 'could not update the specified item');
    }

    public function getSupportedOps()
    {
        return $this->_supportedOps;
    }
}