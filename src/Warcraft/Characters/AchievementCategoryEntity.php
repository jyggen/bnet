<?php
namespace Pwnraid\Bnet\Warcraft\Characters;

use Pwnraid\Bnet\Core\AbstractEntity;

class AchievementCategoryEntity extends AbstractEntity
{
    public function __construct(array $body)
    {
        parent::__construct($body);

        foreach ($this->attributes['achievements'] as &$achievement) {
            $achievement = new AchievementEntity($achievement);
        }

        if (array_key_exists('categories', $this->attributes) === true) {
            foreach ($this->attributes['categories'] as &$category) {
                $category = new AchievementCategoryEntity($category);
            }
        }
    }
}
