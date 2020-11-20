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

namespace District5\RandomTests;

use District5\Random\RandomString;
use PHPUnit\Framework\TestCase;

/**
 * Class RandomStringTest
 * @package RandomTests
 */
class RandomStringTest extends TestCase
{
    public function testSimple()
    {
        $random = RandomString::get(16);
        $this->assertEquals(16, strlen($random));
    }

    public function testIgnoreSomeCharacters()
    {
        $ignore = str_split('0123456789');
        $random = RandomString::get(200, $ignore);
        foreach ($ignore as $char) {
            $this->assertFalse(strstr($random, $char));
        }
    }

    public function testGetWithSpecificCharacter()
    {
        $chars = 'abcde';
        $random = RandomString::generateUniqueString(16, $chars);
        $this->assertEquals(16, strlen($random));
    }
}
