<?php
if (!@include_once __DIR__ . '/../vendor/autoload.php') {
    exit("You must set up the project dependencies, run the following commands:\n> wget http://getcomposer.org/composer.phar\n> php composer.phar install\n");
}

if (function_exists('getFixture') === false) {
    function getFixture($game, $url)
    {
        $filename = __DIR__.'/fixtures/'.$game.'/'.rtrim(preg_replace('{[^a-z0-9.]}i', '-', $url), '-').'.json';

        if (file_exists($filename) === false) {
            return null;
        }

        return json_decode(file_get_contents($filename), true);
    }
}
