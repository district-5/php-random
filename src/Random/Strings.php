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
     * @param bool $allowAlphabetical Whether to allow alphabetical characters.
     * @param bool $allowNumeric Whether to allow numeric characters.
     * @param bool $allowSpecialChars Whether to allow special characters.
     * @param bool $excludeAmbiguous Whether to exclude potentially ambiguous characters.
     * @param array $ignoreChars List of characters to ignore when generating the string.
     * @param bool $forceEachType Whether to force each type of allowed character types so at least one of each occurs, length and ambiguous characters permitting.
     *
     * @return string The pseudo random string.
     */
    public static function custom(int $length, bool $allowAlphabetical, bool $allowNumeric, bool $allowSpecialChars, bool $excludeAmbiguous, array $ignoreChars = [], bool $forceEachType = false): string
    {
        $chars = '';
        $strSoFar = '';
        if ($allowAlphabetical) {
            $chars .= static::CHARS_ALPHABETIC_LOWERCASE . static::CHARS_ALPHABETIC_UPPERCASE;
            if ($forceEachType) {
                $strSoFar .= static::fromStringOfAllowableCharacters(static::CHARS_ALPHABETIC_LOWERCASE . static::CHARS_ALPHABETIC_UPPERCASE, 1);
            }
        }

        if ($allowNumeric) {
            $chars .= static::CHARS_NUMERIC;
            if ($forceEachType) {
                $strSoFar .= static::fromStringOfAllowableCharacters(static::CHARS_NUMERIC, 1);
            }
        }

        if ($allowSpecialChars) {
            $chars .= static::CHARS_SPECIAL;
            if ($forceEachType) {
                $strSoFar .= static::fromStringOfAllowableCharacters(static::CHARS_SPECIAL, 1);
            }
        }

        if ($excludeAmbiguous) {
            $aChars = array_diff(str_split($chars), str_split(static::CHARS_AMBIGUOUS));
            $chars = implode($aChars);
        }

        if (count($ignoreChars) > 0) {
            $aChars = array_diff(str_split($chars), $ignoreChars);
            $chars = implode($aChars);
        }

        if (false === $forceEachType) {
            // just do a standard generate...
            return static::fromStringOfAllowableCharacters($chars, $length);
        } else {
            // work out how much we need to generate and account for small lengths
            $lengthToUse = $length - strlen($strSoFar);
            if ($lengthToUse > 0) {
                $strSoFar .= static::fromStringOfAllowableCharacters($chars, $lengthToUse);
            }

            $strSoFar = str_split($strSoFar);
            shuffle($strSoFar);
            $strSoFar = implode($strSoFar);

            /*
             * if we were asked for a smaller length, such that lengthToUse < 1 we might need to shorten the string from the characters
             * we force generated, otherwise we have the correct length and can return the combined and shuffled string
             */
            return strlen($strSoFar) > $length ? substr($strSoFar, 0, $length) : $strSoFar;
        }


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
