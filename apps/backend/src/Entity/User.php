<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Symfony\Component\Uid\Uuid;

class User
{
    private readonly Uuid $id;

    public function __construct(
        private string $username,
        private string $email,
        private string $password,
    ) {
        $this->id = Uuid::v4();
    }

    public function getUsername(): string
    {
        return $this->email;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }
}
