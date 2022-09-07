<?php

declare(strict_types=1);

namespace App\Entity;

use DateTimeImmutable;
use Symfony\Component\Uid\Uuid;

class Report
{
    private readonly Uuid $id;
    
    public function __construct(
        private User $reporter,
        private Course $course,
        private readonly ?DateTimeImmutable $createdAt
    ) {
        $this->id = Uuid::v4();
        $this->reporter = $reporter;
        $this->course = $course;
        $this->createdAt = $createdAt;
    }

    public function getReporter(): User
    {
        return $this->reporter;
    }

    public function setReporter(User $reporter): void
    {
        $this->reporter = $reporter;
    }

    public function getCourse(): Course
    {
        return $this->getCourse();
    }

    public function setCourse(Course $course): void
    {
        $this->course = $course;
    }

    public function getCreatedAt(): ?DateTimeImmutable
    {
        return $this->createdAt;
    }
}
