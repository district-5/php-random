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
 * Class Uuid
 * @package District5\Random
 */
class Uuid
{
    /**
     * A faster function for quickly generating UUID's making use of the mt_rand function.
     *
     * @param bool $includeHyphens (optional) default true. Whether to hyphenate the UUID.
     *
     * @return string
     */
    public static function simple(bool $includeHyphens = true): string
    {
        $format = $includeHyphens ? '%04x%04x-%04x-%04x-%04x-%04x%04x%04x' : '%04x%04x%04x%04x%04x%04x%04x%04x';
        return sprintf($format,

            // 32 bits for "time_low"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),

            // 16 bits for "time_mid"
            mt_rand(0, 0xffff),

            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand(0, 0x0fff) | 0x4000,

            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand(0, 0x3fff) | 0x8000,

            // 48 bits for "node"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }

    /**
     * A slower but more high entropy function for generating UUID's if 'randomness' is more mission critical.
     *
     * @param int $cost (optional) default 64. How many unique strings should be the base of this randomness?
     * @param bool $includeHyphens (optional) default true. Whether to hyphenate the UUID.
     *
     * @return string
     */
    public static function highEntropy(int $cost = 64, bool $includeHyphens = true): string
    {
        if ($cost < 1) {
            $cost = 1;
        }

        mt_srand(Seed::asInteger());

        $randChars = [];
        $c = 0;
        while ($c < $cost) {
            $randChars[] = md5(uniqid(mt_rand(), true));
            $c++;
        }
        $hyphen = '';
        if ($includeHyphens === true) {
            $hyphen = '-';
        }
        return sprintf(
            '%s%s%s%s%s%s%s%s%s',
            substr($randChars[array_rand($randChars)], 0, 8),
            $hyphen,
            substr($randChars[array_rand($randChars)], 8, 4),
            $hyphen,
            substr($randChars[array_rand($randChars)],12, 4),
            $hyphen,
            substr($randChars[array_rand($randChars)],16, 4),
            $hyphen,
            substr($randChars[array_rand($randChars)],20,12)
        );
    }
}

class_alias('\District5\Random\Uuid', '\District5\Random\Guid');
