<?php

declare(strict_types=1);

namespace App\Entity;

trait IdTrait {
    private int $id;

    public function getId(): int
    {
        return $this->id;
    }
}