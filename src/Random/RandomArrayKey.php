<?php
/**
 * District5 - Random
 *
 * @copyright District5
 *
 * @author District5
 * @author Roger Thomas <roger.thomas@district5.co.uk>
 * @link https://www.district5.co.uk
 *
 * @license This software and associated documentation (the "Software") may not be
 * used, copied, modified, distributed, published or licensed to any 3rd party
 * without the written permission of District5 or its author.
 *
 * The above copyright notice and this permission notice shall be included in
 * all licensed copies of the Software.
 *
 */

namespace District5\Random;

/**
 * Class RandomArrayKey
 * @package District5\Random
 */
class RandomArrayKey
{
    /**
     * Get a random key from an array.
     *
     * @param array $given
     * @return int|string
     */
    public static function get(array $given)
    {
        $providedKeys = array_keys($given);
        shuffle($providedKeys);
        return $providedKeys[RandomInteger::get(0, (count($providedKeys)-1))];
    }
}
