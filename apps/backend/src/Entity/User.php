<?php

declare(strict_types=1);

namespace App\Entity;

class User
{
    private int $id;

    public function __construct(
        private string $username,
        private string $email,
        private array $courses = [],
        private array $reports = [],
        private array $applications = []
    ) {
        $this->username = $username;
        $this->email = $email;
        $this->courses = $courses;
        $this->reports = $reports;
        $this->applications = $applications;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUsername(): string
    {
        return $this->email;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getCourses(): array
    {
        return $this->courses;
    }

    public function setCourses(array $courses): void
    {
        $this->courses = $courses;
    }

    public function getApplications(): array
    {
        return $this->applications;
    }

    public function setApplications(array $applications): void
    {
        $this->applications = $applications;
    }
}
