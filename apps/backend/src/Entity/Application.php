<?php

declare(strict_types=1);

namespace App\Entity;

use DateTimeImmutable;
use Doctrine\Common\Collections\Collection;

class Application extends Identicable
{
    /**
     * @param ?Collection<Vote> $votes
     */
    public function __construct(
        string $id = null,
        private User $applicant,
        private bool $grantedStatus = false,
        private ?Collection $votes = null,
        private readonly ?DateTimeImmutable $createdAt = null,
    ) {
        parent::__construct($id);
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
