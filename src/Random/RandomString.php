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
    const ALL_ALPHANUMERIC = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';
    const UPPERCASE_ALPHANUMERIC = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    const UPPERCASE_ALPHA = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    const NUMERIC = '1234567890';
    const HEX_CHARACTERS = 'abcdef1234567890';

    /**
     * Get a random string.
     * @param int $length
     * @param array $exclude (optional) and array of numbers and letters to exclude (case sensitive)
     * @return string
     */
    public static function get(int $length = 32, array $exclude = []): string
    {
        $upperCase = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ');
        $lowerCase = str_split('abcdefghijklmnopqrstuvwxyz');
        $numbers = str_split('0123456789');

        if (!empty($exclude)) {
            foreach ($exclude as $_ => $deleteValue) {
                if (($key = array_search($deleteValue, $upperCase)) !== false) {
                    unset($upperCase[$key]);
                }
                if (($key = array_search($deleteValue, $lowerCase)) !== false) {
                    unset($lowerCase[$key]);
                }
                if (($key = array_search($deleteValue, $numbers)) !== false) {
                    unset($numbers[$key]);
                }
            }
        }
        $all = array_merge($upperCase, $lowerCase, $numbers);
        $s = '';
        $totalInHaystack = count($all);
        while (strlen($s) !== $length) {
            mt_srand(RandomSeed::get());
            $s .= $all[mt_rand(0, ($totalInHaystack-1))];
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
    public static function generateUniqueString($length = 16, $chars = self::ALL_ALPHANUMERIC)
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
    public static function generateUniqueUppercaseString($length = 16)
    {
        return self::generateUniqueString($length, self::UPPERCASE_ALPHANUMERIC);
    }

    /**
     * Generates pseudo-unique uppercase alpha string
     *
     * @param int $length The length of the string to generate
     *
     * @return string The unique string
     */
    public static function generateUniqueUppercaseAlphaString($length = 16)
    {
        return self::generateUniqueString($length, self::UPPERCASE_ALPHA);
    }

    /**
     * Generates pseudo-unique numeric string
     *
     * @param int $length The length of the string to generate
     *
     * @return string The unique string
     */
    public static function numericString($length = 8)
    {
        return self::generateUniqueString($length, self::NUMERIC);
    }

    /**
     * Generates pseudo-unique hexadecimal string
     *
     * @param int $length The length of the string to generate
     *
     * @return string The unique string
     */
    public static function generateUniqueHexString($length = 24)
    {
        return self::generateUniqueString($length, self::HEX_CHARACTERS);
    }
}
