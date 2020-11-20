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
 * Class RandomString
 * @package District5\Random
 */
class RandomString
{
    const ALL_ALPHANUMERIC_CHARACTERS = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';
    const UPPERCASE_ALPHANUMERIC_CHARACTERS = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    const UPPERCASE_ALPHA_CHARACTERS = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    const NUMERIC_CHARACTERS = '1234567890';
    const HEX_CHARACTERS = 'abcdef1234567890';

    /**
     * Get a random string.
     * @param int $length
     * @param array $exclude (optional) and array of numbers and letters to exclude (case sensitive)
     * @return string
     */
    public static function get(int $length = 32, array $exclude = []): string
    {
        $charSet = str_split(self::ALL_ALPHANUMERIC_CHARACTERS);

        if (!empty($exclude)) {
            foreach ($exclude as $_ => $deleteValue) {
                if (($key = array_search($deleteValue, $charSet)) !== false) {
                    unset($charSet[$key]);
                }
            }
        }
        $s = '';
        $totalInHaystack = count($charSet);
        while (strlen($s) !== $length) {
            mt_srand(RandomSeed::get());
            $s .= $charSet[mt_rand(0, ($totalInHaystack-1))];
        }
        return $s;
    }

    /**
     * Generates a pseudo-unique string
     *
     * @param int $length The length of the string to generate
     * @param string $chars The available characters to include in the string generation
     *
     * @return string The unique string
     */
    public static function generateUniqueString($length = 16, $chars = self::ALL_ALPHANUMERIC_CHARACTERS)
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

    /**
     * Generates pseudo-unique uppercase alphanumeric string
     *
     * @param int $length The length of the string to generate
     *
     * @return string The unique string
     */
    public static function uppercaseAlphanumeric($length = 16)
    {
        return self::generateUniqueString($length, self::UPPERCASE_ALPHANUMERIC_CHARACTERS);
    }

    /**
     * Generates pseudo-unique uppercase alpha string
     *
     * @param int $length The length of the string to generate
     *
     * @return string The unique string
     */
    public static function uppercaseAlpha($length = 16)
    {
        return self::generateUniqueString($length, self::UPPERCASE_ALPHA_CHARACTERS);
    }

    /**
     * Generates pseudo-unique numeric string
     *
     * @param int $length The length of the string to generate
     *
     * @return string The unique string
     */
    public static function numeric($length = 8)
    {
        return self::generateUniqueString($length, self::NUMERIC_CHARACTERS);
    }

    /**
     * Generates pseudo-unique hexadecimal string
     *
     * @param int $length The length of the string to generate
     *
     * @return string The unique string
     */
    public static function hex($length = 24)
    {
        return self::generateUniqueString($length, self::HEX_CHARACTERS);
    }
}
