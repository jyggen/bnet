<?php
namespace Pwnraid\Bnet\Warcraft\Recipes;

use Pwnraid\Bnet\Core\AbstractRequest;

class RecipeRequest extends AbstractRequest
{
    public function find($recipeId)
    {
        $data = $this->client->get('recipe/'.$recipeId);

        if ($data === null) {
            return null;
        }

        return new RecipeEntity($data);
    }
}
