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

use District5\Random\Password;
use PHPUnit\Framework\TestCase;

/**
 * Class PasswordTest
 * @package RandomTests
 */
class PasswordTest extends TestCase
{
    public function testCreateSingle()
    {
        $length = 12;

        $generated = Password::single($length);

        $this->assertEquals($length, strlen($generated));
    }

    public function testCreateSingleWithBadLength()
    {
        $this->expectException(\InvalidArgumentException::class);

        $generated = Password::single(-5);
    }

    public function testCreateMultiple()
    {
        $count = 15;
        $length = 12;

        $generated = Password::multiple($count, $length);

        $this->assertCount($count, $generated);

        foreach ($generated as $singleGenerated) {
            $this->assertEquals($length, strlen($singleGenerated));
        }
    }

    public function testCreateMultipleWithBadCount()
    {
        $this->expectException(\InvalidArgumentException::class);

        $generated = Password::multiple(-5, 5);
    }

    public function testCreateMultipleWithBadLength()
    {
        $this->expectException(\InvalidArgumentException::class);

        $generated = Password::multiple(5, -5);
    }
}
