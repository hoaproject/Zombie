<?php

declare(strict_types=1);

/**
 * Hoa
 *
 *
 * @license
 *
 * New BSD License
 *
 * Copyright © 2007-2017, Hoa community. All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *     * Redistributions of source code must retain the above copyright
 *       notice, this list of conditions and the following disclaimer.
 *     * Redistributions in binary form must reproduce the above copyright
 *       notice, this list of conditions and the following disclaimer in the
 *       documentation and/or other materials provided with the distribution.
 *     * Neither the name of the Hoa nor the names of its contributors may be
 *       used to endorse or promote products derived from this software without
 *       specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDERS AND CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 */

namespace Hoa\Zombie;

use Hoa\Consistency;

/**
 * Class \Hoa\Zombie.
 *
 * Zombie!
 */
class Zombie
{
    /**
     * Test if we can start a zombie.
     */
    public static function test(): bool
    {
        return true === function_exists('fastcgi_finish_request');
    }

    /**
     * Try to create a zombie.
     */
    public static function fork(): bool
    {
        if (true !== static::test()) {
            throw new Exception(
                'This program must run behind PHP-FPM to create a zombie.', 0);
        }

        fastcgi_finish_request();

        return true;
    }

    /**
     * Oh, why not decapitate?
     */
    public static function decapitate()
    {
        static::_kill();

        return;
    }

    /**
     * Maybe, we can bludgeon the zombie?
     */
    public static function bludgeon()
    {
        static::_kill();

        return;
    }

    /**
     * Grilled zombies, hummm!
     */
    public static function burn()
    {
        static::_kill();

        return;
    }

    /**
     * One… two… three… … splash!
     */
    public static function explode()
    {
        static::_kill();

        return;
    }

    /**
     * Would like a slice?
     */
    public static function cutOff()
    {
        static::_kill();

        return;
    }

    /**
     * Whatever, really kill the zombie.
     */
    protected static function _kill()
    {
        exit;
    }

    /**
     * Get PHP's process ID.
     */
    public static function getPid(): int
    {
        return getmypid();
    }
}

/**
 * Flex entity.
 */
Consistency::flexEntity(Zombie::class);
