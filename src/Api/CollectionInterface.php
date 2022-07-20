<?php

namespace Mailchimp\Api;

interface CollectionInterface
{
    /**
     * @param BaseObject $item
     * @return void
     */
    public function addItem(BaseObject $item): void;
}
