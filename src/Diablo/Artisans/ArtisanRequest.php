<?php
namespace Pwnraid\Bnet\Diablo\Artisans;

use Pwnraid\Bnet\Core\AbstractRequest;

class ArtisanRequest extends AbstractRequest
{
    public function find($artisan)
    {
        $data = $this->client->get('data/artisan/'.$artisan);

        if ($data === null) {
            return null;
        }

        return new ArtisanEntity($data);
    }
}
