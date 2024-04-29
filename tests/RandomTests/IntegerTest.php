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
 *
 */

namespace District5\RandomTests;

use District5\Random\Integer;
use PHPUnit\Framework\TestCase;

/**
 * Class IntegerTest
 * @package RandomTests
 */
class IntegerTest extends TestCase
{
    public function testInRangeGeneric()
    {
        $min = 0;
        $max = 10;

        $generated = Integer::inRange($min, $max);

        $this->assertIsInt($generated);
        $this->assertLessThanOrEqual($max, $generated);
        $this->assertGreaterThanOrEqual($min, $generated);
    }

    public function testInRangePoorOrder()
    {
        // swap max and min
        $min = 10;
        $max = 0;

        $generated = Integer::inRange($min, $max);

        $this->assertIsInt($generated);
        // swap max and min
        $this->assertLessThanOrEqual($min, $generated);
        $this->assertGreaterThanOrEqual($max, $generated);
    }

    public function testInRangeNegative()
    {
        $min = -10;
        $max = -5;

        $generated = Integer::inRange($min, $max);

        $this->assertIsInt($generated);
        $this->assertLessThanOrEqual($max, $generated);
        $this->assertGreaterThanOrEqual($min, $generated);
    }

    public function testNegative()
    {
        $min = -10;

        $generated = Integer::negative($min);

        $this->assertIsInt($generated);
        $this->assertLessThanOrEqual(-1, $generated);
        $this->assertGreaterThanOrEqual($min, $generated);
    }

    public function testPositive()
    {
        $max = 50;

        $generated = Integer::positive($max);

        $this->assertIsInt($generated);
        $this->assertLessThanOrEqual($max, $generated);
        $this->assertGreaterThanOrEqual(1, $generated);
    }
}
