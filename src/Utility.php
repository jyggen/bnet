<?php
namespace Pwnraid\Bnet;

use Patchwork\Utf8;

class Utility
{
    protected static $replaceTable = [
        ['à', 'ê', 'é', 'ü'],
        ['a', 'e', 'e', 'u'],
    ];

    public static function realmNameToSlug($realmName)
    {
        $slug = str_replace(static::$replaceTable[0], static::$replaceTable[1], $realmName);
        $slug = str_replace(['-'], [''], $slug);
        $slug = preg_replace('![^'.preg_quote('-').'\pL\pN\s]+!u', '', mb_strtolower($slug, 'UTF-8'));
        $slug = preg_replace('!['.preg_quote('-').'\s]+!u', '-', $slug);
        $slug = trim($slug, '-');

        return $slug;
    }

    public static function thumbnailToId($thumbnailUrl)
    {
        if (preg_match('/\/([0-9]+)\/([0-9]+)(\-avatar\.jpg)$/', $thumbnailUrl, $match) === 0) {
            throw new \RuntimeException('Invalid thumbnail URL "'.$thumbnailUrl.'"');
        }

        return $match[1].$match[2];
    }
}
