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

namespace Boo\BattleNet\Endpoints\CommunityOauthApisCn\Account;

use Boo\BattleNet\Endpoints\EndpointInterface;

/**
 * @internal
 */
final class GetUserInfoParam implements EndpointInterface
{
    private const PATH = '/oauth/userinfo';

    public function __construct(string $accessToken)
    {
    }

    public function getMethod(): string
    {
        return self::METHOD_GET;
    }

    public function getPath(): string
    {
        return self::PATH;
    }
}
