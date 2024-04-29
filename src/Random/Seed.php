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
