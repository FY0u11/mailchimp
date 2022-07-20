<?php

namespace Mailchimp\Api;

class BaseObjectsCollection implements CollectionInterface, ArrayableInterface
{
    /**
     * @var BaseObject[]
     */
    public array $items = [];

    /**
     * @param BaseObject[]|null $items
     */
    public function __construct(?array $items=[])
    {
        $this->items = $items;
    }

    /**
     * @inheritdoc
     */
    public function toArray()
    {
        $result = [];
        foreach ($this->items as $item) {
            $itemToArray = $item->toArray();
            if (!is_array($itemToArray) || empty($itemToArray)) {
                continue;
            }
            $result[] = $itemToArray;
        }

        return $result;
    }

    /**
     * @inheritdoc
     */
    public function addItem(BaseObject $item): void
    {
        $this->items[] = $item;
    }
}
