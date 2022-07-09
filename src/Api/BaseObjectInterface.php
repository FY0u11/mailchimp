<?php

namespace Mailchimp\Api;

interface BaseObjectInterface
{
    /**
     * Returns an array representation of the class' properties.
     *
     * @return array
     */
    public function toArray(): array;
}
