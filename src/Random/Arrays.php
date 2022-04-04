<?php

/**
 * District5 - Random
 *
 * @copyright District5
 *
 * @author District5
 * @link https://www.district5.co.uk
 *
 * @license This software and associated documentation (the "Software") may not be
 * used, copied, modified, distributed, published or licensed to any 3rd party
 * without the written permission of District5 or its author.
 *
 * The above copyright notice and this permission notice shall be included in
 * all licensed copies of the Software.
 */
namespace District5\Random;

class Arrays
{
    /**
     * Get a random item from an array.
     *
     * @param array $given
     *
     * @return mixed
     */
    public static function randomItem(array $given)
    {
        return $given[static::randomKey($given)];
    }

    /**
     * Get a random key from an array.
     *
     * @param array $given
     *
     * @return int|string
     */
    public static function randomKey(array $given)
    {
        $keys = array_keys($given);
        shuffle($keys);
        return $keys[Integer::inRange(0, (count($keys)-1))];
    }
}
