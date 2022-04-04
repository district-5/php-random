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
 * Class RandomInteger
 * @package District5\Random
 * @deprecated use Integer instead
 */
class RandomInteger
{
    /**
     * Get a random string.
     * @param int $minNumber
     * @param int|null $maxNumber
     * @return int
     */
    public static function get(int $minNumber = 0, ?int $maxNumber = null): int
    {
        mt_srand(RandomSeed::get());
        if ($maxNumber === null) {
            $maxNumber = mt_getrandmax();
        }
        if ($maxNumber > mt_getrandmax()) {
            return rand(0, $maxNumber);
        }
        return mt_rand($minNumber, $maxNumber);
    }
}
