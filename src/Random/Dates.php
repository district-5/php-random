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

use DateTime;

/**
 * Class Dates
 * @package District5\Random
 */
class Dates
{
    /**
     * Gets a pseudo random date, with optional formatting.
     *
     * @param string $format The format (optional) default 'Y-m-d'.
     *
     * @return string The pseudo random date.
     */
    public static function date(string $format = 'Y-m-d'): string
    {
        return date($format, static::dateTime()->getTimestamp());
    }

    /**
     * Gets a pseudo random DateTime.
     *
     * @return DateTime The pseudo random DateTime.
     */
    public static function dateTime(): DateTime
    {
        $from = DateTime::createFromFormat('U', '0');
        $to = new DateTime();

        return static::dateTimeBetweenDateTimes($from, $to);
    }

    /**
     * Gets a pseudo random date between 2 Datetime objects.
     *
     * @param DateTime $from The lower bound DateTime.
     * @param DateTime $to The upper bound DateTime.
     * @param string $format The format (optional) default 'Y-m-d'.
     *
     * @return string The pseudo random date.
     */
    public static function dateBetweenDateTimes(DateTime $from, DateTime $to, string $format = 'Y-m-d'): string
    {
        return date($format, static::dateTimeBetweenDateTimes($from, $to)->getTimestamp());
    }

    /**
     * Gets a pseudo random DateTime between 2 DateTime objects.
     *
     * @param DateTime $from The lower bound DateTime.
     * @param DateTime $to The upper bound DateTime.
     *
     * @return DateTime The generated pseudo random DateTime.
     */
    public static function dateTimeBetweenDateTimes(DateTime $from, DateTime $to): DateTime
    {
        $fromTimestamp = $from->getTimestamp();
        $toTimestamp = $to->getTimestamp();

        $newTimestamp = Integer::inRange($fromTimestamp, $toTimestamp);

        return DateTime::createFromFormat('U', strval($newTimestamp));
    }
}
