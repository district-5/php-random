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

/**
 * Class Integer
 * @package District5\Random
 */
class Integer
{
    /**
     * Gets a pseudo random integer between the 2 range values inclusive.
     *
     * Note: if min and max are specified the wrong way around, this function will correct them to ensure
     * the value of min is less than the value of max.
     *
     * @param int $min The minimum bound.
     * @param int|null $max The maximum bound.
     *
     * @return int A pseudo random integer.
     */
    public static function inRange(int $min, int $max = null): int
    {
        if ($max === null) {
            $max = mt_getrandmax();
        }

        if ($min > $max) {
            $tmp = $max;
            $max = $min;
            $min = $tmp;
        }

        return mt_rand($min, $max);
    }

    /**
     * Gets a pseudo random negative integer between a given minimum value and -1 inclusive.
     *
     * @param int|null $min The minimum bound.
     *
     * @return int A pseudo random integer.
     */
    public static function negative(int $min = null): int
    {
        if (null === $min) {
            $min = 0 - mt_getrandmax();
        }

        if ($min > 0) {
            $min = 0 - $min;
        }

        return static::inRange($min, -1);
    }

    /**
     * Gets a pseudo random positive integer between 1 and a given maximum value.
     *
     * @param int|null $max The maximum bound.
     *
     * @return int A pseudo random integer.
     */
    public static function positive(int $max = null): int
    {
        if (null === $max) {
            $max = mt_getrandmax();
        }

        return static::inRange(1, $max);
    }
}
