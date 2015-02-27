<?php
namespace Pwnraid\Bnet\Warcraft\Items;

use Pwnraid\Bnet\Core\AbstractRequest;

class ItemRequest extends AbstractRequest
{
    protected $context = null;

    public function classes()
    {
        $data = $this->client->get('data/item/classes');

        return new ClassEntity($data);
    }

    public function find($itemId, $bonusList = [])
    {
        $data = $this->client->get(rtrim('item/'.$itemId.'/'.$this->context, '/'), [
            'query' => [
                'bl' => implode(',', $bonusList),
            ],
        ]);

        if ($data === null) {
            return null;
        }

        $this->context = '';

        return new ItemEntity($data);
    }

    public function findSet($setId)
    {
        $data = $this->client->get('item/set/'.$setId);

        if ($data === null) {
            return null;
        }

        return new ItemSetEntity($data);
    }

    public function withContext($context)
    {
        $this->context = $context;

        return $this;
    }
}
