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

use District5\Random\RandomArrayItem;
use PHPUnit\Framework\TestCase;

/**
 * Class RandomArrayItemTest
 * @package District5\RandomTests
 */
class RandomArrayItemTest extends TestCase
{
    public function testIntegerKeys()
    {
        $data = [
            'foo',
            'bar',
            'dog',
            'cat'
        ];
        $i = 0;
        while ($i < 100) {
            $item = RandomArrayItem::get($data);
//            $this->assertInternalType('string', $item);
            $this->assertIsString($item);
            $this->assertTrue(in_array($item, $data));
            $i++;
        }
    }

    public function testStringKeys()
    {
        $data = [
            'a' => 'foo',
            'b' => 'bar',
            'c' => 'dog',
            'd' => 'cat'
        ];
        $i = 0;
        while ($i < 100) {
            $item = RandomArrayItem::get($data);
//            $this->assertInternalType('string', $item);
            $this->assertIsString($item);
            $this->assertTrue(in_array($item, array_values($data)));
            $i++;
        }
    }

    public function testMixedKeys()
    {
        $data = [
            'a' => 'foo',
            'bar',
            'c' => 'dog',
            'cat'
        ];
        $i = 0;
        while ($i < 100) {
            $item = RandomArrayItem::get($data);
//            $this->assertInternalType('string', $item);
            $this->assertIsString($item);
            $this->assertTrue(in_array($item, array_values($data)));
            $i++;
        }
    }
}
