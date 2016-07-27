<?php
/**
 * Created by PhpStorm.
 * User: sa
 * Date: 7/26/16
 * Time: 3:41 PM
 */

namespace stockmarket\contract;

use stockmarket\Contract;
use stockmarket\Contractorder;
use stockmarket\Derivatives;
use stockmarket\Portfolio;

/**
 * Class Option
 * @package stockmarket\contract
 */
class Option extends Contract implements Contractorder
{
    use Derivatives;

    /**
     * @return float
     * @throws \Exception
     */
    public function getPrice()
    {
        return $this->contractPrice();
    }

    /**
     * @param $count
     * @return bool
     * @throws \Exception
     */
    public function newOrder($count)
    {
        if (is_integer($count) === false){
            throw new \Exception("Invalid order details");
        }

        if ($this->market->isWorked() === false){
            throw new \Exception("Market currently closed");
        }

        // send order
        if ($this->market->sendOrder($this,$count) === true){
            // update portfolio list
            Portfolio::update($this,$count);
            // update portfolio option list
            Portfolio::addOption($this,$count);
        }else{
            throw new \Exception("Market doesn't approve order");
        }

        return true;
    }
}