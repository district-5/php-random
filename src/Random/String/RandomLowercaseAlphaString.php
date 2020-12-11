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

namespace District5\Random\String;

/**
 * Class RandomLowercaseAlphaString
 * @package District5\Random\String
 */
class RandomLowercaseAlphaString extends AbstractRandomStringWithCharacterSet
{
    /**
     * Generates pseudo-unique lowercase alpha string
     *
     * @param int $length The length of the string to generate
     *
     * @return string The unique string
     */
    public static function get($length = 16)
    {
        return RandomAlphanumericString::get($length, self::LOWERCASE_ALPHA_CHARACTERS);
    }
}
