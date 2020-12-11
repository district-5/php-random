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

use District5\Random\String\AbstractRandomStringWithCharacterSet;

/**
 * Class RandomString
 * @package District5\Random
 */
class RandomString
{
    /**
     * Get a random string.
     * @param int $length
     * @param array $exclude (optional) and array of numbers and letters to exclude (case sensitive)
     * @return string
     */
    public static function get(int $length = 32, array $exclude = []): string
    {
        $charSet = str_split(AbstractRandomStringWithCharacterSet::ALL_ALPHANUMERIC_CHARACTERS);

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
}
