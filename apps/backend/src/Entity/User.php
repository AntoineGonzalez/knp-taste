<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\Common\Collections\Collection;

class User extends Identicable
{
    /**
     * @param ?Collection<Courses> $courses
     * @param ?Collection<Report> $reports
     * @param ?Collection<Application> $applications
     */
    public function __construct(
        string $id = null,
        private string $username,
        private string $email,
        private string $password,
        private ?Collection $courses = null,
        private ?Collection $reports = null,
        private ?Collection $applications = null
    ) {
        parent::__construct($id);
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->courses = $courses;
        $this->reports = $reports;
        $this->applications = $applications;
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
    
    public function getCourses(): ?Collection
    {
        return $this->courses;
    }

    public function setCourses(?Collection $courses = null): void
    {
        $this->courses = $courses;
    }

    public function getReports(): ?Collection
    {
        return $this->reports;
    }

    public function setReports(?Collection $reports = null): void
    {
        $this->reports = $reports;
    }

    public function getApplications(): ?Collection
    {
        return $this->applications;
    }

    public function setApplications(Collection $applications): void
    {
        $this->applications = $applications;
    }

    public function getPassword(): string 
    {
        return $this->password;
    }

    public function setPassword(string $password) :void
    {
        $this->password = $password;
    }
}
