<?php

declare(strict_types=1);

namespace App\Entity;

use DateTimeImmutable;

class Application
{
    private int $id;

    public function __construct(
        private User $applicant,
        private bool $grantedStatus = false,
        private array $votes = [],
        private ?DateTimeImmutable $createdAt = null,
    ) {
        $this->grandedStatus = $grantedStatus;
        $this->applicant = $applicant;
        $this->votes = $votes;
        $this->$createdAt = $createdAt ? $createdAt : new DateTimeImmutable();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getApplicant(): User
    {
        return $this->applicant;
    }

    public function setApplicant(User $applicant): void
    {
        $this->applicant = $applicant;
    }

    public function getVotes(): array
    {
        return $this->votes;
    }

    public function setVotes(array $votes): void
    {
        $this->votes = $votes;
    }

    public function getGrantedStatus(): bool
    {
        return $this->grantedStatus;
    }

    public function setGrantedStatus(bool $grantedStatus): void
    {
        $this->grantedStatus = $grantedStatus;
    }
}
