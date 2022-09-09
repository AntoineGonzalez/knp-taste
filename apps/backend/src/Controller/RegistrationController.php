<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\User;
use App\FormType\RegistrationType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactoryInterface;
use InvalidArgumentException;

class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function register(
        Request $request,
        UserRepository $userRepository,
        EntityManagerInterface $entityManager,
        PasswordHasherFactoryInterface $passwordHasherFactory
    ): Response {
        $form = $this->createForm(RegistrationType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            try {
                $user = $userRepository->findOneBy(['email' => $data['email']]);

                if ($user) {
                    throw new InvalidArgumentException('The User email is already used');
                }

                $passwordHasher = $passwordHasherFactory->getPasswordHasher(User::class);
                $passwordHash = $passwordHasher->hash($data['password']);

                $user = new User(
                    $data['username'],
                    $data['email'],
                    $passwordHash
                );

                $entityManager->persist($user);
                $entityManager->flush($user);
            } catch (\InvalidArgumentException $exception) {
                $errorMessage = $exception->getMessage();

                return $this->renderForm('registration/index.html.twig', [
                    'form' => $form,
                    'errorMessage' => $errorMessage
                ]);
            }

            return $this->redirectToRoute('app_login');
        }

        return $this->renderForm('registration/index.html.twig', [
            'form' => $form,
            'errorMessage' => null
        ]);
    }
}
