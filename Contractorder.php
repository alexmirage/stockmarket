<?php
/**
 * Created by PhpStorm.
 * User: sa
 * Date: 7/26/16
 * Time: 3:31 PM
 */

namespace stockmarket;


/**
 * Interface Contractorder
 * @package stockmarket
 */
interface Contractorder
{
    /**
     * @param $count
     * @return mixed
     */
    public function newOrder($count);
}