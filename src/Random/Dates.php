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
