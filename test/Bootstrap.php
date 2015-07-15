<?php
if (!@include_once __DIR__ . '/../vendor/autoload.php') {
    exit("You must set up the project dependencies, run the following commands:\n> wget http://getcomposer.org/composer.phar\n> php composer.phar install\n");
}

define('FIXTURES_DIR', __DIR__.'/fixtures');

if (function_exists('getFixture') === false) {
    function getFixture($game, $url)
    {
        $filename = FIXTURES_DIR.'/'.urlToFilename($game, $url);

        if (file_exists($filename) === false) {
            return null;
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
