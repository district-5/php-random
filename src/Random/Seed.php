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
 *
 */
namespace District5\Random;

/**
 * Class Seed
 * @package District5\Random
 */
class Seed
{
    /**
     * Get a random seed as an integer.
     *
     * @return int Seed integer.
     */
    public static function asInteger(): int
    {
        return intval(static::asString());
    }

    /**
     * Get a random seed as a string.
     *
     * @return string Seed string.
     */
    public static function asString(): string
    {
        $unique = str_split(uniqid());
        $additional = '';
        foreach ($unique as $u) {
            $additional .= ord($u);
        }

        list($uSec, $sec) = explode(' ', strval(microtime()));
        $temp = (strval((floatval($sec) + intval($additional) + floatval($uSec) * mt_getrandmax())));
        $pieces = str_split($temp);
        shuffle($pieces);
        $string = implode('', $pieces);
        if (substr($string, 0, 1) === '0') {
            $string = strval(rand(1, 9)) . substr($string, 0, -1) . '0';
        }

        return $string;
    }
}
