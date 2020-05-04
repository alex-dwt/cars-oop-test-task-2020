<?php

declare(strict_types=1);

namespace App\Entity;

class Customer implements EntityInterface {
    use IdTrait;

    private string $name;

    public function __construct(string $name)
    {
        $this->id = rand(1, 99999); //todo

        $this->name = $name;
    }
}