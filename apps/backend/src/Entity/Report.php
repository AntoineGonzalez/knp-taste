<?php

declare(strict_types=1);

namespace App\Entity;

use DateTimeImmutable;

class Report
{

    private int $id;

    public function __construct(
        private User $reporter,
        private Course $course,
        private ?DateTimeImmutable $createdAt
    ) {
        $this->reporter = $reporter;
        $this->course = $course;
        $this->createdAt = $createdAt;
    }

    public function getId(): int
    {
        return $this->id;
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
