<?php

/*
 * This file is part of the Battle.net API Client package.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once './vendor/autoload.php';

define('FIXTURES_DIR', __DIR__.'/fixtures');

if (function_exists('getFixture') === false) {
    function getFixture($game, $url)
    {
        $filename = FIXTURES_DIR.'/'.urlToFilename($game, $url);

        if (file_exists($filename) === false) {
            return;
        }

        return file_get_contents('compress.zlib://'.$filename);
    }
}

if (function_exists('urlToFilename') === false) {
    function urlToFilename($game, $url)
    {
        return $game.'/'.mb_strtolower(rtrim(preg_replace('{[^a-z0-9.]}i', '-', $url), '-')).'.json.gz';
    }
}
