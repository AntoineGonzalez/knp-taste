<?php

declare(strict_types=1);

namespace App\Service\User;

use App\Entity\User;
use App\Repository\User\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use InvalidArgumentException;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class RegistrationService
{
    public function __construct(
        private UserRepository $userRepository,
        private EntityManagerInterface $entityManager,
        private UserPasswordHasherInterface $passwordHasher
    ) {
    }

    public function registerUser(array $userData): void
    {
        $user = $this->userRepository->findOneBy(['email' => $userData['email']]);

        if ($user) {
            throw new InvalidArgumentException('The User email is already used');
        }

        $user = new User(
            $userData['username'],
            $userData['email'],
        );

        $hashedPassword = $this->passwordHasher->hashPassword(
            $user,
            $userData['password']
        );

        $user->setPassword($hashedPassword);

        $this->entityManager->persist($user);
        $this->entityManager->flush($user);
    }
}
