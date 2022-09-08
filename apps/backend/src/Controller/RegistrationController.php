<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\RegistrationService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function index(Request $request, RegistrationService $registrationService)
    {
        $form = $this->createFormBuilder()
            ->add('email', EmailType::class, [
                'label' => "Adresse mail",
                'required' => true,
            ])
            ->add('username', TextType::class, [
                'required' => true,
                'label' => "Nom d'utilisateur"
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Les mots de passes doivent être identique.',
                'options' => ['attr' => ['class' => 'password-field']],
                'required' => true,
                'first_options'  => ['label' => 'Mot de passe'],
                'second_options' => ['label' => 'Confirmation du mot de passe'],
            ])
            ->add('save', SubmitType::class, ['label' => 'S\'inscrire !'])
            ->getForm();

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
