<?php

declare(strict_types=1);

namespace App\Entity;

use App\Enum\VoteOption;
use DateTimeImmutable;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Uid\Uuid;

class Vote
{
    private readonly Uuid $id;

    /**
     * @param ?Collection<Application> $applications
     */
    public function __construct(
        private VoteOption $value,
        private ?Collection $applications = null,
        private readonly ?DateTimeImmutable $createdAt = null
    ) {
        $this->id = Uuid::v4();
        $this->value = $value;
        $this->createdAt = $createdAt ? $createdAt : new DateTimeImmutable();
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

    public function getApplications(): ?Collection
    {
        return $this->applications;
    }

    public function setApplications(?Collection $applications = null): void
    {
        $this->applications = $applications;
    }
}
