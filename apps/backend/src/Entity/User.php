<?php

declare(strict_types=1);

namespace App\Entity;

use DateTime;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Uid\Uuid;

class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    private Uuid $id;

    public function __construct(
        private string $username,
        private string $email,
        private string $password,
        private array $roles = [],
        private int $courseVisitCounter = 0,
        private ?DateTime $lastCourseAccessedAt = null,
        private bool $isAdmin = false,
    ) {
        $this->id = Uuid::v4();
    }

    public function getId(): Uuid
    {
        return $this->id;
    }

    /**
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return $this->email;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        if ($this->isAdmin) {
            return ['ROLE_ADMIN'];
        }

        return ['ROLE_USER'];
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function getCourseVisitCounter(): int
    {
        return $this->courseVisitCounter;
    }

    public function incrementVisitCounter(): void
    {
        $this->courseVisitCounter++;
    }

    public function getLastCourseAccessedAt(): ?DateTime
    {
        return $this->lastCourseAccessedAt;
    }

    public function setLastCourseAccessedAt(DateTime $dateTime): void
    {
        $this->lastCourseAccessedAt = $dateTime;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
    }
}
