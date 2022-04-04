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
 * Class AbstractRandomStringWithCharacterSet
 * @package District5\Random\String
 * @deprecated use Strings instead
 */
abstract class AbstractRandomStringWithCharacterSet
{
    const ALL_ALPHANUMERIC_CHARACTERS = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890';
    const UPPERCASE_ALPHANUMERIC_CHARACTERS = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    const LOWERCASE_ALPHANUMERIC_CHARACTERS = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    const LOWERCASE_ALPHA_CHARACTERS = 'abcdefghijklmnopqrstuvwxyz';
    const UPPERCASE_ALPHA_CHARACTERS = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    const NUMERIC_CHARACTERS = '1234567890';
    const HEX_CHARACTERS = 'abcdef1234567890';
    const SPECIAL_CHARACTERS = '!"#$%&\\\'()*+,-./:;<=>?@[\]^_`{|}~';
}
