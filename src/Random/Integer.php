<?php

/**
 * District5 Randomness Library
 *
 * @author      District5 <hello@district5.co.uk>
 * @copyright   District5 <hello@district5.co.uk>
 * @link        https://www.district5.co.uk
 *
 * MIT LICENSE
 *
 *  Permission is hereby granted, free of charge, to any person obtaining
 *  a copy of this software and associated documentation files (the
 *  "Software"), to deal in the Software without restriction, including
 *  without limitation the rights to use, copy, modify, merge, publish,
 *  distribute, sublicense, and/or sell copies of the Software, and to
 *  permit persons to whom the Software is furnished to do so, subject to
 *  the following conditions:
 *
 *  The above copyright notice and this permission notice shall be
 *  included in all copies or substantial portions of the Software.
 *
 *  THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 *  EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 *  MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 *  NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
 *  LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
 *  OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
 *  WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
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

        return $min > $max ? mt_rand($max, $min) : mt_rand($min, $max);
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
