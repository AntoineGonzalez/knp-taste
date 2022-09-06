<?php

declare(strict_types=1);

namespace App\Entity;

use App\Enum\VoteOption;
use DateTimeImmutable;

class Vote
{
    private int $id;

    public function __construct(
        private VoteOption $value,
        private array $applications,
        private ?DateTimeImmutable $createdAt = null
    ) {
        $this->value = $value;
        $this->createdAt = $createdAt ? $createdAt : new DateTimeImmutable();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getValue(): VoteOption
    {
        return $this->value;
    }

    public function setValue(VoteOption $value): void
    {
        $this->value = $value;
    }

    public function getCreatedAt(): ?DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getApplications(): array
    {
        return $this->applications;
    }

    public function setApplications(array $applications): void
    {
        $this->applications = $applications;
    }
}
