<?php
/**
 * Created by PhpStorm.
 * User: sa
 * Date: 7/26/16
 * Time: 4:46 PM
 */

namespace stockmarket\contract;

use stockmarket\Contract;
use stockmarket\Contractorder;
use stockmarket\Portfolio;

/**
 * Class Stock
 * @package stockmarket\contract
 */
class Stock extends Contract implements Contractorder
{
    /**
     * @return float
     */
    public function getPrice()
    {
        return ($this->ask + $this->bid)/2;
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

        if ($this->market->sendOrder($this,$count) === true){
            // update portfolio list
            Portfolio::update($this,$count);
            // update portfolio stock list
            Portfolio::addStock($this,$count);
        }else{
            throw new \Exception("Market doesn't approve order");
        }

        return true;
    }
}