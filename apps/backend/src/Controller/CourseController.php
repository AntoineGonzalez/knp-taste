<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\Course\CourseCreationService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CourseController extends AbstractController
{
    #[Route('/course', name: 'app_course')]
    public function index(): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        return $this->render('course/index.html.twig');
    }

    #[Route('/course/create', name: 'app_course_create')]
    public function create(Request $request, CourseCreationService $courseCreationService): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $form = $this->createFormBuilder()
            ->add('name', TextType::class, [
                'label' => "Course name",
                'required' => true,
            ])
            ->add('videoUrl', UrlType::class, [
                'required' => true,
                'label' => "Url de la video"
            ])
            ->add('save', SubmitType::class, ['label' => 'Enregistrer'])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $courseCreationService->create($this->getUser(), (array) $form->getData());

            return $this->redirectToRoute('app_course');
        }

        return $this->renderForm('course/create.html.twig', ['form' => $form]);
    }
}
