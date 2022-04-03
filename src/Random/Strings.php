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

/**
 * Class Strings
 * @package District5\Random
 */
class Strings
{
    const CHARS_ALPHANUMERIC = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    const CHARS_ALPHANUMERIC_LOWERCASE = 'abcdefghijklmnopqrstuvwxyz0123456789';
    const CHARS_ALPHANUMERIC_UPPERCASE = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    const CHARS_ALPHABETIC_LOWERCASE = 'abcdefghijklmnopqrstuvwxyz';
    const CHARS_ALPHABETIC_UPPERCASE = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    const CHARS_AMBIGUOUS = '0OIlS5Z2!$,.;:|';
    const CHARS_NUMERIC = '0123456789';
    const CHARS_HEX = 'abcdef0123456789';
    const CHARS_SPECIAL = '!"#$%&\\\'()*+,-./:;<=>?@[\]^_`{|}~';

    /**
     * Generates a pseudo random string containing only alphanumeric characters.
     *
     * @param int $length The length of the string to generate.
     *
     * @return string The pseudo random string.
     */
    public static function alphanumeric(int $length = 16): string
    {
        return static::fromStringOfAllowableCharacters(static::CHARS_ALPHANUMERIC, $length);
    }

    /**
     * Generates a pseudo random string using custom options.
     *
     * @param int $length The length of the string to generate.
     * @param bool $includeAlphabetical Whether to include alphabetical characters.
     * @param bool $includeNumeric Whether to include numeric characters.
     * @param bool $includeSpecialChars Whether to include special characters.
     * @param bool $excludeAmbiguous Whether to exclude potentially ambiguous characters.
     * @param array $ignoreChars List of characters to ignore when generating the string.
     *
     * @return string The pseudo random string.
     */
    public static function custom(int $length, bool $includeAlphabetical, bool $includeNumeric, bool $includeSpecialChars, bool $excludeAmbiguous, array $ignoreChars = []): string
    {
        $chars = '';
        if ($includeAlphabetical) {
            $chars .= static::CHARS_ALPHABETIC_LOWERCASE;
        }

        if ($includeNumeric) {
            $chars .= static::CHARS_NUMERIC;
        }

        if ($includeSpecialChars) {
            $chars .= static::CHARS_SPECIAL;
        }

        if ($excludeAmbiguous) {
            $aChars = array_diff(str_split($chars), static::CHARS_AMBIGUOUS);
            $chars = implode($aChars);
        }

        if (count($ignoreChars) > 0) {
            $aChars = array_diff(str_split($chars), $ignoreChars);
            $chars = implode($aChars);
        }

        return static::fromStringOfAllowableCharacters($chars, $length);
    }

    /**
     * Generates a pseudo random string containing only lowercase alphanumeric characters.
     *
     * @param int $length The length of the string to generate.
     *
     * @return string The pseudo random string.
     */
    public static function alphanumericLowercase(int $length = 16): string
    {
        return static::fromStringOfAllowableCharacters(static::CHARS_ALPHANUMERIC_LOWERCASE, $length);
    }

    /**
     * Generates a pseudo random string containing only uppercase alphanumeric characters.
     *
     * @param int $length The length of the string to generate.
     *
     * @return string The pseudo random string.
     */
    public static function alphanumericUppercase(int $length = 16): string
    {
        return static::fromStringOfAllowableCharacters(static::CHARS_ALPHANUMERIC_UPPERCASE, $length);
    }

    /**
     * Generates a pseudo random string containing alphanumeric and special characters.
     *
     * @param int $length The length of the string to generate.
     *
     * @return string The pseudo random string.
     */
    public static function alphanumericWithSpecial(int $length = 16): string
    {
        return static::fromStringOfAllowableCharacters(static::CHARS_ALPHANUMERIC . static::CHARS_SPECIAL, $length);
    }

    /**
     * Generates a pseudo random string containing only lowercase alphabetic characters.
     *
     * @param int $length The length of the string to generate.
     *
     * @return string The pseudo random string.
     */
    public static function alphabeticLowercase(int $length = 16): string
    {
        return static::fromStringOfAllowableCharacters(static::CHARS_ALPHABETIC_LOWERCASE, $length);
    }

    /**
     * Generates a pseudo random string containing only uppercase alphabetic characters.
     *
     * @param int $length The length of the string to generate.
     *
     * @return string The pseudo random string.
     */
    public static function alphabeticUppercase(int $length = 16): string
    {
        return static::fromStringOfAllowableCharacters(static::CHARS_ALPHABETIC_UPPERCASE, $length);
    }

    /**
     * Generates a pseudo random string of a given length from a list of given allowable characters.
     *
     * @param string $chars
     * @param int $length
     *
     * @return string
     */
    public static function fromStringOfAllowableCharacters(string $chars, int $length = 16): string
    {
        // Length of character list
        $charsLength = (strlen($chars) - 1);

        // Start our string
        $string = $chars[rand(0, $charsLength)];

        // Generate random string
        for ($i = 1; $i < $length; $i = strlen($string)) {
            // Grab a random character from our list
            $r = $chars[rand(0, $charsLength)];

            // Make sure the same two characters don't appear next to each other
            if ($r != $string[$i - 1]) {
                $string .= $r;
            }
        }

        // Return the string
        return $string;
    }

    /**
     * Generates pseudo random hexadecimal string.
     *
     * @param int $length The length of the string to generate.
     *
     * @return string The pseudo random string.
     */
    public static function hex(int $length = 16): string
    {
        return static::fromStringOfAllowableCharacters(static::CHARS_HEX, $length);
    }

    /**
     * Generates pseudo random hexadecimal string.
     *
     * @param int $length The length of the string to generate.
     *
     * @return string The pseudo random string.
     */
    public static function numeric(int $length = 16): string
    {
        return static::fromStringOfAllowableCharacters(static::CHARS_NUMERIC, $length);
    }
}
