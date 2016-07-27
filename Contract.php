<?php
/**
 * Created by PhpStorm.
 * User: sa
 * Date: 7/26/16
 * Time: 5:15 PM
 */

namespace stockmarket;

/**
 * Class Contract
 * @package stockmarket
 */
abstract class Contract
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var float
     */
    protected $ask;

    /**
     * @var float
     */
    protected $bid;

    /**
     * @var market
     */
    public $market;

    /**
     * @param $name
     * @param $ask
     * @param $bid
     * @param market $market
     * @throws \Exception
     */
    public function __construct($name,$ask,$bid,\stockmarket\market $market)
    {
        if (strlen($name)<2 || is_numeric($ask) === false || is_numeric($bid) === false || isset($market) === false){
            throw new \Exception("Invalid contract details");
        }

        $this->name = $name;

        $this->ask = $ask;

        $this->bid = $bid;

        $this->market = $market;
    }

    /**
     * @return mixed
     */
    abstract function getPrice();
}