<?php
/**
 * Created by PhpStorm.
 * User: sa
 * Date: 7/26/16
 * Time: 3:38 PM
 */

namespace stockmarket;

/**
 * Class Market
 * @package stockmarket
 */
abstract class Market
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var integer
     */
    protected $open_time;

    /**
     * @var integer
     */
    protected $close_time;

    /**
     * @var float
     */
    protected $comission;

    /**
     * @param $name
     * @param $open_time
     * @param $close_time
     * @param $comission
     */
    public function __construct($name,$open_time,$close_time,$comission)
    {
        $this->name = $name;

        $this->open_time = $open_time;

        $this->close_time = $close_time;

        $this->comission = $comission;
    }

    /**
     * @param Contract $contract
     * @param $count
     * @return mixed
     */
    abstract function sendOrder(\stockmarket\Contract $contract,$count);

    /**
     * @return bool
     * @throws \Exception
     */
    public function isWorked()
    {
        $current_time = (int)date("Hi");

        if (isset($this->open_time) === false || is_integer($this->open_time) === false || isset($this->close_time) === false || is_integer($this->close_time) === false){
            throw new \Exception("Invalid market data");
        }

        if ($current_time < $this->open_time || $current_time > $this->close_time){
            return false;
        }else{
            return true;
        }
    }

    /**
     * @param $count
     * @return float
     * @throws \Exception
     */
    public function calculateComission($count)
    {
        if (is_integer($count) === false || isset($this->comission) === false || is_numeric($this->comission) === false){
            throw new \Exception("Invalid order details");
        }

        return $this->comission*abs($count);
    }
}