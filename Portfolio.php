<?php
/**
 * Created by PhpStorm.
 * User: sa
 * Date: 7/26/16
 * Time: 4:34 PM
 */

namespace stockmarket;


/**
 * Class Portfolio
 * @package stockmarket
 */
class Portfolio
{
    /**
     * @var array of \stockmarket\contract
     */
    public static $data;

    /**
     * @var array of \stockmarket\contract\option
     */
    public static $options;

    /**
     * @var array of \stockmarket\contract\stock
     */
    public static $stock;

    /**
     * @var float
     */
    public static $value;

    /**
     * @var float
     */
    public static $cash;

    /**
     * @param Contract $contract
     * @param $count
     */
    public static function addOption(\stockmarket\Contract $contract, $count)
    {

    }

    /**
     * @param Contract $contract
     * @param $count
     */
    public static function addStock(\stockmarket\Contract $contract, $count)
    {

    }

    /**
     * @param Contract $contract
     * @param $count
     * @return mixed
     * @throws \Exception
     */
    public static function update(\stockmarket\Contract $contract, $count)
    {
        if (is_integer($count) === false || isset($contract) === false){
            throw new \Exception("Invalid order details");
        }

        // sum of order
        $sum = $contract->getPrice()*$count + $contract->market->calculateComission($count);

        if ($count > 0 && Portfolio::$cash - $sum < 0){
            throw new \Exception("Not enough cash");
        }

        // add contract in portfolio
        Portfolio::$data[] = array(
            'count'=>$count,
            'contract'=>$contract
        );

        // update portfolio value
        if (isset(Portfolio::$value) === false){
            Portfolio::$value = $sum;
        }else{
            Portfolio::$value = Portfolio::$value + $sum;
        }

        return Portfolio::$value;
    }

}