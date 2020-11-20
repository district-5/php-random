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
use District5\Random\RandomDateTime;
use PHPUnit\Framework\TestCase;

/**
 * Class RandomDateTimeTest
 * @package RandomTests
 */
class RandomDateTimeTest extends TestCase
{
    public function testDefault()
    {
        $date = RandomDateTime::get();
        $this->assertInstanceOf('DateTime', $date);
    }

    public function testSameDate()
    {
        $dateTime = new DateTime();
        $otherDateTime = clone $dateTime;
        $this->assertEquals($dateTime->getTimestamp(), RandomDateTime::get($dateTime, $otherDateTime)->getTimestamp());
    }

    public function testDifferentDates()
    {
        $dateTime = DateTime::createFromFormat('U', '0');
        $otherDateTime = clone $dateTime;
        $otherDateTime->add(new DateInterval('P900D'));
        $newlyGenerated = RandomDateTime::get($dateTime, $otherDateTime);

        $this->assertInstanceOf('DateTime', $newlyGenerated);
    }
}
