<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\User;
use App\Repository\UserRepository;
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

    public function registerUser(array $userData)
    {
        $users = $this->userRepository->findBy(['email' => $userData['email']]);

        if (sizeof($users) > 0) {
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
