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

namespace Boo\BattleNet\Apis\Diablo;

use Boo\BattleNet\Apis\AbstractApi;
use Psr\Http\Message\RequestInterface;

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
