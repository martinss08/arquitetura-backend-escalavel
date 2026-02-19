<?php

namespace App\DTO;

class CreateProductDTO 
{
    public $name;
    public $quanty;
    public $value;

    public function __construct(string $name, int $quanty, int $value)
    {
        $this->name = $name;
        $this->quanty = $quanty;
        $this->value = $value;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['name'],
            $data['quanty'],
            $data['value'],
        );
    }
}