<?php

declare(strict_types=1);

/*
 * This file is part of boo/bnet.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Boo\BattleNet;

final class Utils
{
    /**
     * @var array<array<string>>
     */
    private static $replaceTable = [
        ['à', 'ê', 'é', 'ü', '-'],
        ['a', 'e', 'e', 'u', ''],
    ];

    /**
     * @var array<array<string>>
     */
    private static $regexTable = [
        ['![^\-\pL\pN\s]+!u', '![\-\s]+!u'],
        ['', '-'],
    ];

    /**
     * Constructor.
     */
    private function __construct()
    {
    }

    /**
     * Returns an URL friendly version of a realm name.
     *
     * @param string $name
     *
     * @return string
     */
    public static function realmNameToSlug(string $name): string
    {
        $name = \mb_strtolower($name, 'UTF-8');
        $slug = \str_replace(static::$replaceTable[0], static::$replaceTable[1], $name);
        $slug = \preg_replace(static::$regexTable[0], static::$regexTable[1], $slug);

        return \trim($slug, '-');
    }

    /**
     * Returns a character's unique ID from a thumbnail URL.
     *
     * @param string $thumbnailUrl
     *
     * @return string
     */
    public static function thumbnailToId(string $thumbnailUrl): string
    {
        if (1 !== \preg_match('/\/([\d]+)\/([\d]+)(\-avatar\.jpg)$/', $thumbnailUrl, $match)) {
            throw new \RuntimeException(\vsprintf('Invalid thumbnail URL "%s"', [
                $thumbnailUrl,
            ]));
        }

        return ltrim($match[1].$match[2], '0');
    }
}
