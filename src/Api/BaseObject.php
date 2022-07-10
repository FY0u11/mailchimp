<?php

namespace Mailchimp\Api;

class BaseObject implements BaseObjectInterface
{
    /**
     * @inheritdoc
     */
    public function toArray()
    {
        $classRC = new \ReflectionClass(static::class);

        $dataToReturn = [];
        foreach ($classRC->getProperties() as $property) {
            if (is_null($property->getValue($this))) {
                continue;
            }
            if ($property->getType()->isBuiltin()) {
                $dataToReturn[$property->getName()] = $property->getValue($this);
                continue;
            }
            try {
                $propertyRC = new \ReflectionClass($property->getType()->getName());
                if ($propertyRC->isSubclassOf(BaseObjectInterface::class)) {
                    /** @var BaseObjectInterface $baseObjectProperty */
                    $baseObjectProperty = $property->getValue($this);
                    $dataToReturn[$property->getName()] = $baseObjectProperty->toArray();
                }
            } catch (\ReflectionException $reflectionException) {
                continue;
            }
        }

        // using stdClass for empty objects in order to json_encode() function cast them to '{}'
        return empty($dataToReturn) ? new \stdClass() : $dataToReturn;
    }
}
