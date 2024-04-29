<?php

/**
 * District5 Randomness Library
 *
 * @author      District5 <hello@district5.co.uk>
 * @copyright   District5 <hello@district5.co.uk>
 * @link        https://www.district5.co.uk
 *
 * MIT LICENSE
 *
 *  Permission is hereby granted, free of charge, to any person obtaining
 *  a copy of this software and associated documentation files (the
 *  "Software"), to deal in the Software without restriction, including
 *  without limitation the rights to use, copy, modify, merge, publish,
 *  distribute, sublicense, and/or sell copies of the Software, and to
 *  permit persons to whom the Software is furnished to do so, subject to
 *  the following conditions:
 *
 *  The above copyright notice and this permission notice shall be
 *  included in all copies or substantial portions of the Software.
 *
 *  THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
 *  EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 *  MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
 *  NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
 *  LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
 *  OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
 *  WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */
namespace District5\Random;

class Password
{
    /**
     * Generates a pseudo random password of given length.
     *
     * @param int $length The length to generate.
     *
     * @return string The generated password.
     */
    public static function single(int $length = 8): string
    {
        static::ensurePositive($length);

        return Strings::custom($length, true, true, true, false);
    }

    /**
     * Generates a list of a given number of pseudo random passwords of given length.
     *
     * Note: This does not enforce all generated passwords are unique which should not be an issue if you are adding a salt
     * to initial passwords before applying your password hashing.
     *
     * @param int $count The number of passwords to generate.
     * @param int $length The length of each password to generate.
     *
     * @return array A list of generated passwords.
     */
    public static function multiple(int $count, int $length = 8): array
    {
        static::ensurePositive($count);
        static::ensurePositive($length);

        $results = [];
        for ($i = 0; $i < $count; $i++) {
            $results[] = Strings::custom($length, true, true, true, false);
        }

        return $results;
    }

    /**
     * Quick sanity check for a positive integer.
     *
     * @param int $value
     *
     * @return void
     */
    private static function ensurePositive(int $value): void
    {
        if ($value < 1) {
            $caller = debug_backtrace(!DEBUG_BACKTRACE_PROVIDE_OBJECT|DEBUG_BACKTRACE_IGNORE_ARGS,2)[1]['function'];
            throw new \InvalidArgumentException('Password::' . $caller . '() expects a positive integer');
        }
    }
}
