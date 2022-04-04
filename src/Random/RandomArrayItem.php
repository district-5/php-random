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
 * Class RandomArrayItem
 * @package District5\Random
 * @deprecated use Arrays instead
 */
class RandomArrayItem
{
    /**
     * Get a random item from an array.
     *
     * @param array $given
     * @return mixed
     */
    public static function get(array $given)
    {
        return $given[RandomArrayKey::get($given)];
    }
}
