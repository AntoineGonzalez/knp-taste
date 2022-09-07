<?php

declare(strict_types=1);

namespace App\Entity;

use DateTimeImmutable;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Uid\Uuid;

class Application
{
    private readonly Uuid $id;

    /**
     * @param ?Collection<Vote> $votes
     */
    public function __construct(
        private User $applicant,
        private bool $grantedStatus = false,
        private ?Collection $votes = null,
        private readonly ?DateTimeImmutable $createdAt = null,
    ) {
        $this->id = Uuid::v4();
        $this->grandedStatus = $grantedStatus;
        $this->applicant = $applicant;
        $this->votes = $votes;
        $this->$createdAt = $createdAt ? $createdAt : new DateTimeImmutable();
    }

    public function getApplicant(): User
    {
        return $this->applicant;
    }

    public function setApplicant(User $applicant): void
    {
        $this->applicant = $applicant;
    }

    public function getVotes(): ?Collection
    {
        return $this->votes;
    }

    public function setVotes(?Collection $votes = null): void
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

    public function getCreatedAt(): ?DateTimeImmutable
    {
        return $this->createdAt;
    }
}
