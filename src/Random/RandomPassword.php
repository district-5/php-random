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

use District5\Random\String\RandomAlphanumericString;

/**
 * Class RandomPassword
 * @package District5\Random
 */
class RandomPassword
{
    /**
     * Get a random password. By default it will include uppercase, lowercase, numbers and special characters.
     *
     * @param int $length (optional) default 8
     * @param bool $uppercase (optional) whether to force at least 1 uppercase character into the mix
     * @param bool $lowercase (optional) whether to force at least 1 lower case character into the mix
     * @param bool $number (optional) whether to force at least 1 numeric character into the mix
     * @param bool $special (optional) whether to force at least 1 special character into the mix
     * @return string|null
     */
    public static function get(int $length = 8, bool $uppercase=true, bool $lowercase=true, bool $number=true, bool $special=true): ?string
    {
        $chars = [];
        $allChars = '';
        if ($uppercase === true) {
            $uppercaseChars = 'ABCDEFGHJKLMNPQRSTUVWXYZ';
            $allChars .= $uppercaseChars;
            $generated = RandomAlphanumericString::get(1, $uppercaseChars);
            $chars['a' . $generated] = $generated;
        }
        if ($lowercase === true) {
            $lowercaseChars = 'abcdefghjklmnpqrstuvwxyz';
            $allChars .= $lowercaseChars;
            $generated = RandomAlphanumericString::get(1, $lowercaseChars);
            $chars['a' . $generated] = $generated;
        }
        if ($number === true) {
            $numericChars = '23456789';
            $allChars .= $numericChars;
            $generated = RandomAlphanumericString::get(1, $numericChars);
            $chars['a' . $generated] = $generated;
        }
        if ($special === true) {
            $specialChars = '!#$%&()*+,-.:;<=>?@[\]^_`{|}~';
            $allChars .= $specialChars;
            $generated = RandomAlphanumericString::get(1, $specialChars);
            $chars['a' . $generated] = $generated;
        }
        if (strlen($allChars) === 0 || count($chars) > $length) {
            return null;
        }
        if (count($chars) === $length) {
            shuffle($chars);
            return implode('', $chars);
        }
        foreach ($chars as $aChar) {
            $allChars = str_replace($aChar, '', $allChars);
        }
        $remaining = $length - count($chars);
        $newPiece = RandomAlphanumericString::get($remaining, $allChars);
        foreach (str_split($newPiece) as $newChar) {
            $chars['a' . $newChar] = $newChar;
        }

        $generatedPassword = '';
        $totalCharacters = count($chars);
        $i = 0;
        while ($i < $totalCharacters) {
            $randomKey = RandomArrayKey::get($chars);
            $generatedPassword .= $chars[$randomKey];
            unset($chars[$randomKey]);
            $i++;
        }

        return $generatedPassword;
    }
}
