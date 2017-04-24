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

namespace Boo\BattleNet;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\UriInterface;

interface RequestFactoryInterface
{

    /**
     * Creates a PSR-7 request.
     *
     * @param string $method
     * @param string $path
     * @param array  $query
     *
     * @return RequestInterface
     */
    public function make(string $method, string $path, array $query = []): RequestInterface;
}
