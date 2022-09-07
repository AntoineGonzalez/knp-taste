<?php

declare(strict_types=1);

namespace App\Entity;

use DateTime;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Uid\Uuid;

class Course
{
    private readonly Uuid $id;

    /**
     * @param ?Collection<Report> $reports
     */
    public function __construct(
        private string $name,
        private string $videoUrl,
        private User $author,
        private ?Collection $reports = null,
        private ?DateTime $unpublishedAt = null
    ) {
        $this->id = Uuid::v4();
        $this->name = $name;
        $this->videoUrl = $videoUrl;
        $this->author = $author;
        $this->reports = $reports;
        $this->unpublishedAt = $unpublishedAt;
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

    public function getReports(): ?Collection
    {
        return $this->reports;
    }

    public function setReports(?Collection $reports = null): void
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
