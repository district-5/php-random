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

use DateTime;

/**
 * Class RandomDate
 * @package District5\Random
 */
class RandomDate
{
    /**
     * Get a random date. Optionally between 2 dates.
     *
     * @param string $format (optional) default 'Y-m-d'
     * @param DateTime|null $oldest
     * @param DateTime|null $newest
     * @return string
     */
    public static function get($format = 'Y-m-d', ?DateTime $oldest = null, ?DateTime $newest = null): string
    {
        $random = RandomDateTime::get($oldest, $newest);
        return date($format, $random->getTimestamp());
    }
}
