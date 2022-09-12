<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Course;
use App\FormType\CourseType;
use App\Repository\Course\CourseRepository;
use App\Repository\User\UserRepository;
use App\Service\CourseGuardService;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class CourseController extends AbstractController
{
    #[Route('/course', name: 'app_course')]
    #[IsGranted('IS_AUTHENTICATED_FULLY')]
    public function index(CourseRepository $courseRepository): Response
    {
        $courses = $courseRepository->findAll();

        return $this->render('course/index.html.twig', [
            'courses' => $courses
        ]);
    }

    #[Route('/course/{id}', name: 'app_course_page')]
    #[IsGranted('IS_AUTHENTICATED_FULLY')]
    public function show(
        string $id,
        CourseRepository $courseRepository,
        UserRepository $userRepository,
        CourseGuardService $courseGuardService,
        EntityManagerInterface $entityManager
    ): Response {
        $user = $userRepository->findOneBy(['email' => $this->getUser()->getUserIdentifier()]);

        if ($courseGuardService->checkAccess($user)) {
            $user->incrementVisitCounter();
            $user->setLastCourseAccessedAt(new DateTime());

            $entityManager->persist($user);
            $entityManager->flush($user);
        } else {
            return $this->redirectToRoute('app_course');
        }

        $course = $courseRepository->findOneBy(['id' => $id]);

        if (!$course) {
            $this->redirectToRoute('app_course');
        }

        return $this->render('course/page.html.twig', [
            'course' => $course
        ]);
    }

    #[Route('/course/create', name: 'app_course_create')]
    #[IsGranted('IS_AUTHENTICATED_FULLY')]
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {
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
