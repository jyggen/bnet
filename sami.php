<?php
declare(strict_types=1);

/*
 * This file is part of the Battle.net API Client package.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


use Sami\Sami;

return new Sami('src', [
    'title' => 'boo/bnet',
    'build_dir' => __DIR__.'/build/docs',
    'cache_dir' => __DIR__.'/build/cache',
    'default_opened_level' => 2,
]);
