<?php

declare(strict_types=1);

namespace App\Service\Course;


use App\Repository\Course\CourseRepository;
use Symfony\Component\HttpFoundation\Request;

class CourseListingService
{
    public function __construct(
        private CourseRepository $courseRepository,
    ) {
    }

    /**
     * @return array<int, Course>
     */
    public function index() :array
    {
        return $this->courseRepository->findAll();
    }
}
