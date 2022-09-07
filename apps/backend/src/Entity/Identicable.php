<?php

declare(strict_types=1);

namespace App\Entity;

use Symfony\Component\Uid\Uuid;

abstract class Identicable
{
    protected readonly Uuid $id;

    public function __construct(?string $id = null)
    {
        $this->id = Uuid::fromString($id) ?? Uuid::v4();
    }

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function __toString()
    {
        return (string) $this->getId();
    }
}
