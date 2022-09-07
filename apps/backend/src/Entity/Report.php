<?php

declare(strict_types=1);

namespace App\Entity;

use DateTimeImmutable;

class Report extends Identicable
{
    public function __construct(
        string $id = null,
        private User $reporter,
        private Course $course,
        private readonly ?DateTimeImmutable $createdAt
    ) {
        parent::__construct($id);
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
