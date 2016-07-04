<?php

/*
 * This file is part of the Battle.net API Client package.
 *
 * (c) Jonas Stendahl <jonas@stendahl.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pwnraid\Bnet\Warcraft\Characters;

use Pwnraid\Bnet\Core\AbstractEntity;

class AchievementCategoryEntity extends AbstractEntity
{
    /**
     * @param array $body
     */
    public function __construct(array $body)
    {
        parent::__construct($body);

        foreach ($this->attributes['achievements'] as &$achievement) {
            $achievement = new AchievementEntity($achievement);
        }

        if (array_key_exists('categories', $this->attributes) === true) {
            foreach ($this->attributes['categories'] as &$category) {
                $category = new self($category);
            }
        }
    }
}
