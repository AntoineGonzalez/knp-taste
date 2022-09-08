<?php

declare(strict_types=1);

namespace App\Service\Course;

use App\Entity\Course;
use App\Entity\User;
use App\Repository\Course\CourseRepository;
use Doctrine\ORM\EntityManagerInterface;

class CourseCreationService
{
    public function __construct(
        private EntityManagerInterface $entityManager
    ) {
    }

    public function create(User $author, array $courseData)
    {
        $course = new Course(
            $courseData['name'],
            $courseData['videoUrl'],
            $author,
        );

        $this->entityManager->persist($course);
        $this->entityManager->flush($course);
    }
}
