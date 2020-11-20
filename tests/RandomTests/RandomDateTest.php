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

use DateInterval;
use DateTime;
use District5\Random\RandomDate;
use PHPUnit\Framework\TestCase;

/**
 * Class RandomDateTest
 * @package District5\RandomTests
 */
class RandomDateTest extends TestCase
{
    public function testDefault()
    {
        $this->assertEquals(10, strlen(RandomDate::get()));
    }

    public function testSameDate()
    {
        $dateTime = new DateTime();
        $otherDateTime = clone $dateTime;
        $this->assertEquals($dateTime->format('Y-m-d'), RandomDate::get('Y-m-d', $dateTime, $otherDateTime));
    }

    public function testDifferentDates()
    {
        $dateTime = DateTime::createFromFormat('U', '0');
        $otherDateTime = clone $dateTime;
        $otherDateTime->add(new DateInterval('P900D'));
        $newlyGenerated = RandomDate::get('Y-m-d', $dateTime, $otherDateTime);

        $this->assertEquals(10, strlen($newlyGenerated));
    }
}
