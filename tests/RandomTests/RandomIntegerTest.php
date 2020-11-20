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

use District5\Random\RandomInteger;
use PHPUnit\Framework\TestCase;

/**
 * Class RandomIntegerTest
 * @package RandomTests
 */
class RandomIntegerTest extends TestCase
{
    public function testSimple()
    {
        $random = RandomInteger::get(0, 10);
        $this->assertInternalType('integer', $random);
        $this->assertLessThanOrEqual(10, $random);
        $this->assertGreaterThanOrEqual(0, $random);
    }
}
