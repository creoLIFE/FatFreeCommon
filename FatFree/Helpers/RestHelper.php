<?php
/**
 * Created by PhpStorm.
 * User: ratman
 * Date: 16/02/15
 * Time: 13:32
 */

namespace FatFree\Helpers;

use FatFree\Helpers\ModelMethodsHelper;

class RestHelper extends ModelMethodsHelper
{
    /*
     * @const string STATUS_500 - 500 status - server error durring response
     */
    const STATUS_500 = 500;
    const STATUS_500_MSG = 'Response error';

    /*
     * @const string STATUS_500 - 204 status - no data
     */
    const STATUS_204 = 204;
    const STATUS_204_MSG = 'No data';


    /*
     * @const string STATUS_200 - 200 status - no data
     */
    const STATUS_200 = 200;
    const STATUS_200_MSG = 'OK';

    /*
     * @var integer $status - response status
     */
    protected $status = self::STATUS_204;

    /*
     * @var integer $sId - Session ID
     */
    protected $sId;

    /*
     * @var mixed $data - data object
     */
    protected $data;

    /*
     * @var string $msg - message
     */
    protected $msg;

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
        $this->setStatus($data ? 200 : 204);
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $sId
     */
    public function setSId($sId)
    {
        $this->sId = $sId;
    }

    /**
     * @return mixed
     */
    public function getSId()
    {
        return $this->sId;
    }

    /**
     * @param int $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function getMsg()
    {
        return $this->msg;
    }

    /**
     * @param mixed $msg
     */
    public function setMsg($msg)
    {
        $this->msg = $msg;
    }

    /**
     * Class constructor
     */
    public function __construct()
    {
        $this->setStatus(self::STATUS_204);
        $this->setMsg(self::STATUS_204_MSG);
        $this->setData(null);
    }
}