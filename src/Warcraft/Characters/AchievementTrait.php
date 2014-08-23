<?php
namespace Pwnraid\Bnet\Warcraft\Characters;

trait AchievementTrait
{
    public function achievement($achievementId)
    {
        $data = $this->client->get('achievement/'.$achievementId);

        if ($data === null) {
            return null;
        }

        return new AchievementEntity($data);
    }
}
