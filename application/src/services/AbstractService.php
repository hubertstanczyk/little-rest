<?php

namespace src\services;
use src\core\ServiceException;

/**
 * Abstract class for application Service
 * @author Hubert Stanczyk <hubert.stanczyk@gmail.com>
 * @version 1.0
 */
abstract class AbstractService
{
    private $_supportedOps = array();

    abstract public function getOne($id);

    abstract public function getMany();

    abstract public function deleteOne($id);

    abstract public function createOne();

    abstract public function updateOne($id);

    /**
     * Returns operations supported by the service
     * @return array
     */
    public function getSupportedOps()
    {
        return $this->_supportedOps;
    }

    /**
     * Returns the response header
     * @return type
     * @todo implement the body
     */
    public function returnHeader()
    {
        return null;
    }

    /**
     * Returns service specific method based on the request method
     * @param string $op
     * @param integer $id
     * @throws ServiceException
     */
    public function run($op, $id = null)
    {

        if (!in_array($op, $this->getSupportedOps()))
            throw new ServiceException('unsupported option');

        switch ($op) {
            case 'GET':
                if (isset($id))
                    $this->getOne($id);
                else
                    $this->getMany();
                break;
            case 'POST':
                $this->createOne();
                break;
            case 'PUT':
                if (!$id)
                    throw new ServiceException('missing ID parameter');
                $this->updateOne($id);
                break;
            case 'DELETE':
                if (!$id)
                    throw new ServiceException('missing ID parameter');
                $this->deleteOne($id);
                break;
            case 'OPTIONS':
                $this->getSupportedOps();
                break;
            case 'HEAD':
                $this->returnHeader();
                break;
        }
    }
}