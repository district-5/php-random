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
 * Class RandomGuid
 * @package District5\Random
 */
class RandomGuid
{
    /**
     * Generate a guid.
     *
     * @param int $cost (optional) default 64. How many unique strings should be the base of this randomness?
     * @param bool $includeHyphens (optional) default true. Whether to hyphenate the guid.
     * @return string
     */
    public static function get(int $cost = 64, bool $includeHyphens = true): string
    {
        if ($cost < 1) {
            $cost = 1;
        }

        mt_srand(RandomSeed::get());

        $randChars = [];
        $c = 0;
        while ($c < $cost) {
            $randChars[] = strtoupper(md5(uniqid(mt_rand(), true)));
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
