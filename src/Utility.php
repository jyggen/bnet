<?php
namespace Pwnraid\Bnet;

use Patchwork\Utf8;

class Utility
{
    public static function realmNameToSlug($realmName)
    {
        $slug = Utf8::toAscii($realmName);
        $slug = str_replace(['-'], [''], $slug);
        $slug = preg_replace('![^'.preg_quote('-').'\pL\pN\s]+!u', '', mb_strtolower($slug));
        $slug = preg_replace('!['.preg_quote('-').'\s]+!u', '-', $slug);
        $slug =  trim($slug, '-');

        if ($slug === '') {
            return str_replace([' '], ['-'], $realmName);
        }

        return $slug;
    }
}
