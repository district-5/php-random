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

use District5\Random\Dates;
use PHPUnit\Framework\TestCase;

/**
 * Class ArraysTest
 * @package RandomTests
 */
class DatesTest extends TestCase
{
    public function testDateDefault()
    {
        $generated = Dates::date();

        $this->assertEquals(10, strlen($generated));
    }

    public function testDateBetweenDateTimesSameDateTime()
    {
        $format = 'Y-m-d';
        $lower = new \DateTime();
        $upper = clone $lower;

        $this->assertEquals($lower->format($format), Dates::dateBetweenDateTimes($lower, $upper, $format));
    }

    public function testDateBetweenDateTimesDifferentDateTimes()
    {
        $lower = \DateTime::createFromFormat('U', '0');
        $upper = clone $lower;
        $upper->add(new \DateInterval('P900D'));

        $generated = Dates::dateBetweenDateTimes($lower, $upper, 'Y-m-d');

        $this->assertEquals(10, strlen($generated));
    }

    public function testDateTimeDefault()
    {
        $generated = Dates::dateTime();

        $this->assertInstanceOf('DateTime', $generated);
    }

    public function testDateTimeBetweenDateTimesSameDateTime()
    {
        $lower = new \DateTime();
        $upper = clone $lower;

        $this->assertEquals($lower->getTimestamp(), Dates::dateTimeBetweenDateTimes($lower, $upper)->getTimestamp());
    }

    public function testDateTimeBetweenDateTimesDifferentDateTimes()
    {
        $lower = \DateTime::createFromFormat('U', '0');
        $upper = clone $lower;
        $upper->add(new \DateInterval('P900D'));

        $generated = Dates::dateTimeBetweenDateTimes($lower, $upper);

        $this->assertInstanceOf('DateTime', $generated);
        $this->assertGreaterThanOrEqual($lower->getTimestamp(), $generated->getTimestamp());
        $this->assertLessThanOrEqual($upper->getTimestamp(), $generated->getTimestamp());
    }
}
