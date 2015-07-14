<?php
namespace Pwnraid\Bnet\Warcraft\Items;

use Pwnraid\Bnet\Core\AbstractRequest;

class ItemRequest extends AbstractRequest
{
    /**
     * @var string|null
     */
    protected $context = null;

    /**
     * @return ClassEntity
     */
    public function classes()
    {
        $data = $this->client->get('data/item/classes');

        return new ClassEntity($data);
    }

    /**
     * @param int   $itemId
     * @param array $bonusList
     *
     * @return ItemEntity|null
     */
    public function find($itemId, array $bonusList = [])
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

    /**
     * @param int $setId
     *
     * return ItemSetEntity|null
     */
    public function findSet($setId)
    {
        $data = $this->client->get('item/set/'.$setId);

        if ($data === null) {
            return null;
        }

        return new ItemSetEntity($data);
    }

    /**
     * @param string $context
     *
     * @return ItemRequest
     */
    public function withContext($context)
    {
        $this->context = $context;

        return $this;
    }
}
