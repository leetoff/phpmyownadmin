<?php


namespace src\Core\Domain\Entity;


abstract class AbstractAttributesEntity
{
    public function getAttributes(): array
    {
        $attributes = [];
        foreach (array_keys(get_object_vars($this)) as $attrName) {
            $attributes[$attrName] = $this->{$attrName};
        }
        return $attributes;
    }
}