<?php

/*
 * This file is part of the Battle.net API Client package.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pwnraid\Bnet;

class Utils
{
    /**
     * @var array
     */
    protected static $replaceTable = [
        ['à', 'ê', 'é', 'ü'],
        ['a', 'e', 'e', 'u'],
    ];

    /**
     * @param string $realmName
     *
     * @return string
     */
    public static function realmNameToSlug($realmName)
    {
        $slug = str_replace(static::$replaceTable[0], static::$replaceTable[1], $realmName);
        $slug = str_replace(['-'], [''], $slug);
        $slug = preg_replace('![^'.preg_quote('-').'\pL\pN\s]+!u', '', mb_strtolower($slug, 'UTF-8'));
        $slug = preg_replace('!['.preg_quote('-').'\s]+!u', '-', $slug);
        $slug = trim($slug, '-');

        return $slug;
    }

    /**
     * @param string $thumbnailUrl
     *
     * @return string
     */
    public static function thumbnailToId($thumbnailUrl)
    {
        if (preg_match('/\/([0-9]+)\/([0-9]+)(\-avatar\.jpg)$/', $thumbnailUrl, $match) === 0) {
            throw new \RuntimeException('Invalid thumbnail URL "'.$thumbnailUrl.'"');
        }

        return $match[1].$match[2];
    }
}
