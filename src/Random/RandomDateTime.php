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
 * Class RandomDateTime
 * @package District5\Random
 * @deprecated use Dates instead
 */
class RandomDateTime
{
    /**
     * Get a random date between 2 dates.
     *
     * @param DateTime|null $oldest
     * @param DateTime|null $newest
     * @return DateTime
     */
    public static function get(?DateTime $oldest = null, ?DateTime $newest = null): DateTime
    {
        if ($oldest === null) {
            $oldest = DateTime::createFromFormat('U', '0');
        }
        if ($newest === null) {
            $newest = new DateTime();
        }

        if ($newest < $oldest) {
            $tmp = clone $oldest;
            $oldest = $newest;
            $newest = $tmp;
        }
        $oldestTime = $oldest->getTimestamp();
        $newestTime = $newest->getTimestamp();
        if ($oldestTime === $newestTime) {
            return $oldest;
        }
        $diff = $newestTime - $oldestTime;
        $randInt = RandomInteger::get(0, $diff);
        $newTimestamp = $oldestTime + $randInt;

        return DateTime::createFromFormat('U', strval($newTimestamp));
    }
}
