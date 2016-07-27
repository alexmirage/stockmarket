<?php
/**
 * Created by PhpStorm.
 * User: sa
 * Date: 7/26/16
 * Time: 3:43 PM
 */

namespace stockmarket;


/**
 * Class Derivatives
 * @package stockmarket
 */
trait Derivatives
{
    /**
     * @var (call/put)
     */
    protected $type;

    /**
     * @var integer
     */
    protected $multiply;

    /**
     * @return float
     * @throws \Exception
     */
    public function contractPrice()
    {
        if (isset($this->ask) === false || isset($this->bid) === false || isset($this->multiply) === false){
            throw new \Exception("Invalid contract details");
        }

        return $this->multiply*($this->ask+$this->bid)/2;
    }

}