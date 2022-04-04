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

use District5\Random\RandomArrayItem;

/**
 * Class RandomAlphanumericString
 * @package District5\Random\String
 * @deprecated use Strings instead
 */
class RandomAlphanumericString extends AbstractRandomStringWithCharacterSet
{
    /**
     * Generates a pseudo-unique string
     *
     * @param int $length The length of the string to generate
     * @param string $chars The available characters to include in the string generation
     *
     * @return string The unique string
     */
    public static function get($length = 16, $chars = self::ALL_ALPHANUMERIC_CHARACTERS)
    {
        $splitCharacters = str_split($chars);
        // Start our string
        $string = RandomArrayItem::get($splitCharacters);

        // Generate random string
        for ($i = 1; $i < $length; $i = strlen($string)) {
            // Grab a random character from our list
            $r = RandomArrayItem::get($splitCharacters);

            // Make sure the same two characters don't appear next to each other
            if ($r != substr($string, -1)) {
                $string .= $r;
            }
        }

        // Return the string
        return $string;
    }
}
