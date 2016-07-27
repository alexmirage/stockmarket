<?php
/**
 * Created by PhpStorm.
 * User: sa
 * Date: 7/26/16
 * Time: 4:24 PM
 */

namespace stockmarket\market;


use stockmarket\Market;

/**
 * Class Nyse
 * @package stockmarket\market
 */
class Nyse extends Market
{
    /**
     * @param \stockmarket\Contract $contract
     * @param $count
     * @return bool
     */
    public function sendOrder(\stockmarket\Contract $contract,$count){
        return true;
    }
}