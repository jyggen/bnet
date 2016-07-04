<?php

/*
 * This file is part of the Battle.net API Client package.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pwnraid\Bnet\Warcraft\Recipes;

use Pwnraid\Bnet\Core\AbstractRequest;

class RecipeRequest extends AbstractRequest
{
    public function find($recipeId)
    {
        $data = $this->client->get('recipe/'.$recipeId);

        if ($data === null) {
            return;
        }

        return new RecipeEntity($data);
    }
}
