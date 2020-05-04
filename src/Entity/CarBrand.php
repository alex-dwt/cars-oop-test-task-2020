<?php

declare(strict_types=1);

namespace App\Entity;

class CarBrand implements EntityInterface {
    use IdTrait;

    private string $name;

    public function __construct(int $id, string $name)
    {
        $this->id = $id;

        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}