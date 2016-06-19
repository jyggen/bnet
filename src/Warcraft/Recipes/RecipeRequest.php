<?php
namespace Pwnraid\Bnet\Warcraft\Recipes;

use Pwnraid\Bnet\Core\AbstractRequest;

class RecipeRequest extends AbstractRequest
{
    public function find($recipeId)
    {
        $data = $this->client->get('recipe/'.$recipeId);

        if (is_null($data)) {
            return null;
        }

        if($this->asJson) {
            return json_encode($data);
        }

        return new RecipeEntity($data);
    }
}
