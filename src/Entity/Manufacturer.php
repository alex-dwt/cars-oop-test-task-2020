<?php

declare(strict_types=1);

namespace App\Entity;

class Manufacturer implements EntityInterface {
    use IdTrait;

    private string $name;

    public function __construct(int $id, string $name)
    {
        $this->id = $id;

        $this->name = $name;
    }
}