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

use District5\Random\Strings;
use PHPUnit\Framework\TestCase;

/**
 * Class StringsTest
 * @package RandomTests
 */
class StringsTest extends TestCase
{
    public function testCustomLength()
    {
        $desiredLength = 24;

        $generated = Strings::fromStringOfAllowableCharacters('abc123', $desiredLength);
        $this->assertEquals($desiredLength, strlen($generated));
    }

    public function testFromListOfAllowableCharacters()
    {
        $allowed = 'abc123';
        $generated = Strings::fromStringOfAllowableCharacters('abc123', 16);

        $diff = $this->buildDiff($generated, $allowed);
        $this->assertCount(0, $diff);
    }

    public function testAlphanumeric()
    {
        $generated = Strings::alphanumeric();
        $allowed = Strings::CHARS_ALPHANUMERIC;

        $diff = $this->buildDiff($generated, $allowed);
        $this->assertCount(0, $diff);
    }

    public function testAlphanumericLowercase()
    {
        $generated = Strings::alphanumericLowercase();
        $allowed = Strings::CHARS_ALPHANUMERIC_LOWERCASE;

        $diff = $this->buildDiff($generated, $allowed);
        $this->assertCount(0, $diff);
    }

    public function testAlphanumericUppercase()
    {
        $generated = Strings::alphanumericUppercase();
        $allowed = Strings::CHARS_ALPHANUMERIC_UPPERCASE;

        $diff = $this->buildDiff($generated, $allowed);
        $this->assertCount(0, $diff);
    }

    public function testAlphabeticLowercase()
    {
        $generated = Strings::alphabeticLowercase();
        $allowed = Strings::CHARS_ALPHABETIC_LOWERCASE;

        $diff = $this->buildDiff($generated, $allowed);
        $this->assertCount(0, $diff);
    }

    public function testAlphabeticUppercase()
    {
        $generated = Strings::alphabeticUppercase();
        $allowed = Strings::CHARS_ALPHABETIC_UPPERCASE;

        $diff = $this->buildDiff($generated, $allowed);
        $this->assertCount(0, $diff);
    }

    public function testIgnoreSomeCharacters()
    {
        $ignore = str_split('123456');
        $generated = Strings::custom(32, false, true, false, false, $ignore);
        $allowed = '0789';

        $diff = $this->buildDiff($generated, $allowed);
        $this->assertCount(0, $diff);
    }

    public function testHex()
    {
        $generated = Strings::hex();
        $allowed = Strings::CHARS_HEX;

        $diff = $this->buildDiff($generated, $allowed);
        $this->assertCount(0, $diff);
    }

    public function testNumeric()
    {
        $generated = Strings::numeric();
        $allowed = Strings::CHARS_NUMERIC;

        $diff = $this->buildDiff($generated, $allowed);
        $this->assertCount(0, $diff);
    }

    private function buildDiff(string $generated, string $allowed): array
    {
        $generatedSplit = str_split($generated);
        $allowedSplit = str_split($allowed);

        return array_diff($generatedSplit, $allowedSplit);
    }
}
