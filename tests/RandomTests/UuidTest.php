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

use District5\Random\Uuid;
use PHPUnit\Framework\TestCase;

/**
 * Class UuidTest
 * @package RandomTests
 */
class UuidTest extends TestCase
{
    public function testSimpleWithHyphens()
    {
        $generated = Uuid::simple();

        $this->assertEquals(36, strlen($generated));
        $this->assertEquals('-', $generated[8]);
        $this->assertEquals('-', $generated[13]);
        $this->assertEquals('-', $generated[18]);
        $this->assertEquals('-', $generated[23]);
    }

    public function testSimpleWithoutHyphens()
    {
        $generated = Uuid::simple(false);

        $this->assertEquals(32, strlen($generated));
    }

    public function testHighEntropyWithHyphens()
    {
        $generated = Uuid::highEntropy(64, true);

        $this->assertEquals(36, strlen($generated));
        $this->assertEquals('-', $generated[8]);
        $this->assertEquals('-', $generated[13]);
        $this->assertEquals('-', $generated[18]);
        $this->assertEquals('-', $generated[23]);
    }

    public function testHighEntropyWithoutHyphens()
    {
        $generated = Uuid::highEntropy(64, false);

        $this->assertEquals(32, strlen($generated));
    }
}
