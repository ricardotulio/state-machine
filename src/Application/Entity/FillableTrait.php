<?php

namespace Application\Entity;

trait FillableTrait
{
    public function fill($data)
    {
        foreach($data as $attribute => $value) {
            $method = 'with'.ucfirst($this->snakeToCamelCase($attribute));
            $this->$method($value);
        }
    }

    public function snakeToCamelCase($attribute)
    {
        $words = explode('_', $attribute);

        $attributeInCamelCase = array_shift($words);

        foreach($words as $word) {
            $wordsInCamelCase .= ucfirst($word);
        }

        return $attributeInCamelCase;
    }
}
