<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Course;
use App\FormType\CourseType;
use App\Service\Course\CourseListingService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CourseController extends AbstractController
{
    #[Route('/course', name: 'app_course')]
    public function index(CourseListingService $courseListingService): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $courses = $courseListingService->index();

        return $this->render('course/index.html.twig', [
            'courses' => $courses
        ]);
    }

    #[Route('/course/create', name: 'app_course_create')]
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $form = $this->createForm(CourseType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $course = new Course(
                $data['name'],
                $data['videoUrl'],
                $this->getUser(),
            );

            $entityManager->persist($course);
            $entityManager->flush($course);

            return $this->redirectToRoute('app_course');
        }

        return $this->renderForm('course/create.html.twig', ['form' => $form]);
    }
}
