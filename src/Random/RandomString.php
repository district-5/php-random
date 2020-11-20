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
}
