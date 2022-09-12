<?php

declare(strict_types=1);

namespace App\Entity;

use DateTime;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Uid\Uuid;

class Course
{
    private Uuid $id;

    /**
     * @param ?Collection<Report> $reports
     */
    public function __construct(
        private string $name,
        private string $videoUrl,
        private User $author,
        private ?DateTime $unpublishedAt = null
    ) {
        $this->id = Uuid::v4();
    }

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getVideoUrl(): string
    {
        return $this->videoUrl;
    }

    public function getAuthor(): User
    {
        return $this->author;
    }
}
