<?php

declare(strict_types=1);

namespace App\Controller;

use App\FormType\RegistrationType;
use App\Service\User\RegistrationService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function index(Request $request, RegistrationService $registrationService): Response
    {
        $form = $this->createForm(RegistrationType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $registrationService->registerUser((array) $form->getData());
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
