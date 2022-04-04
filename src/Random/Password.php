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
