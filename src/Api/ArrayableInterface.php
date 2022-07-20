<?php

namespace Mailchimp\Api;

interface ArrayableInterface
{
    /**
     * Returns an array representation of the class' properties.
     *
     * @return array|object
     */
    public function toArray();
}
