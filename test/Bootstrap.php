<?php
if (!@include_once __DIR__ . '/../vendor/autoload.php') {
    exit("You must set up the project dependencies, run the following commands:\n> wget http://getcomposer.org/composer.phar\n> php composer.phar install\n");
}

if (!isset($_SERVER['key'])) {
    exit("You must create the environment variable \"key\" and set it to a valid Battle.net API key.\n");
}
