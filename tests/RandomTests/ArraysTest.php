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

use District5\Random\Arrays;
use PHPUnit\Framework\TestCase;

/**
 * Class ArraysTest
 * @package RandomTests
 */
class ArraysTest extends TestCase
{
    public function testGetKeyFromIntegerKeys()
    {
        $data = ['foo', 'bar', 'dog', 'cat'];
        $testIterations = 20;

        for ($i = 0; $i < $testIterations; $i++) {
            $key = Arrays::randomKey($data);

            $this->assertIsInt($key);
            $this->assertArrayHasKey($key, $data);
        }
    }

    public function testGetKeyFromStringKeys()
    {
        $data = ['a' => 'foo', 'b' => 'bar', 'c' => 'dog', 'd' => 'cat'];
        $testIterations = 20;

        for ($i = 0; $i < $testIterations; $i++) {
            $key = Arrays::randomKey($data);

            $this->assertIsString($key);
            $this->assertArrayHasKey($key, $data);
        }
    }

    public function testGetKeyForMixedKeys()
    {
        $data = ['a' => 'foo', 'bar', 'c' => 'dog', 'cat'];
        $testIterations = 20;

        for ($i = 0; $i < $testIterations; $i++) {
            $key = Arrays::randomKey($data);

            $this->assertArrayHasKey($key, $data);
        }
    }

    public function testGetItemForIntegerKeys()
    {
        $data = ['foo', 'bar', 'dog', 'cat'];
        $testIterations = 20;

        for ($i = 0; $i < $testIterations; $i++) {
            $item = Arrays::randomItem($data);

            $this->assertIsString($item);
            $this->assertTrue(in_array($item, $data));
        }
    }

    public function testGetItemFromStringKeys()
    {
        $data = ['a' => 'foo', 'b' => 'bar', 'c' => 'dog', 'd' => 'cat'];
        $testIterations = 20;

        for ($i = 0; $i < $testIterations; $i++) {
            $item = Arrays::randomItem($data);

            $this->assertIsString($item);
            $this->assertTrue(in_array($item, array_values($data)));
        }
    }

    public function testMixedKeys()
    {
        $data = ['a' => 'foo', 'bar', 'c' => 'dog', 'cat'];
        $testIterations = 20;

        for ($i = 0; $i < $testIterations; $i++) {
            $item = Arrays::randomItem($data);

            $this->assertIsString($item);
            $this->assertTrue(in_array($item, array_values($data)));
        }
    }
}
