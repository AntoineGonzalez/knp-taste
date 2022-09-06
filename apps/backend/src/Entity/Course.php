<?php

declare(strict_types=1);

namespace App\Entity;

use DateTime;

class Course
{
    private int $id;

    public function __construct(
        private string $name,
        private string $videoUrl,
        private User $author,
        private array $reports,
        private ?DateTime $unpublishedAt = null
    ) {
        $this->name = $name;
        $this->videoUrl = $videoUrl;
        $this->author = $author;
        $this->reports = $reports;
        $this->unpublishedAt = $unpublishedAt;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getVideoUrl(): string
    {
        return $this->videoUrl;
    }

    public function setVideoUrl(string $videoUrl): void
    {
        $this->videoUrl = $videoUrl;
    }

    public function getAuthor(): User
    {
        return $this->author;
    }

    public function setAuthor(User $author)
    {
        $this->author = $author;
    }

    public function getReports(): array
    {
        return $this->reports;
    }

    public function setReports(array $reports): void
    {
        $this->reports = $reports;
    }

    public function getUnpublishedAt(): ?DateTime
    {
        return $this->unpublishedAt;
    }

    public function setUnpublishedAt(?DateTime $unpublishedAt): void
    {
        $this->unpublishedAt = $unpublishedAt;
    }
}
