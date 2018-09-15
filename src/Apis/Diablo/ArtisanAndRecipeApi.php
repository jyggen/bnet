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

namespace Boo\BattleNet\Apis\Diablo;

use Boo\BattleNet\Apis\AbstractApi;
use Psr\Http\Message\RequestInterface;

/**
 * DO NOT EDIT. This file was auto-generated based on the Battle.net API docs.
 */
final class ArtisanAndRecipeApi extends AbstractApi
{
    public function getArtisan(string $artisanSlug): RequestInterface
    {
        return $this->createRequest('GET', '/d3/data/artisan/'.$artisanSlug);
    }

    public function getRecipe(string $artisanSlug, string $recipeSlug): RequestInterface
    {
        return $this->createRequest('GET', '/d3/data/artisan/'.$artisanSlug.'/recipe/'.$recipeSlug);
    }

    /**
     * {@inheritdoc}
     */
    protected function getRestrictedRegions(): array
    {
        return [
            'SEA',
        ];
    }
}
