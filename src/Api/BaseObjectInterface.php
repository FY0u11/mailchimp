<?php

namespace Mailchimp\Api;

interface BaseObjectInterface
{
    /**
     * Returns an array representation of the class' properties.
     *
     * @return array|object
     */
    public function toArray();
}
