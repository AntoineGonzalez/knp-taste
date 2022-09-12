<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\User;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;

class CourseGuardService
{
    public function __construct(private ContainerBagInterface $params)
    {
    }

    /**
     * Check wether or not a user can access course page
     * 
     * @param User $authUser
     * @return bool
     */
    public function checkAccess(User $authUser): bool
    {
        $currentDatetime = new DateTime();
        $lastUserAccess = $authUser->getLastCourseAccessedAt();

        return in_array('ROLE_ADMIN', $authUser->getRoles()) ||
            $authUser->getCourseVisitCounter() < $this->params->get('course_access.visit_limit') ||
            $currentDatetime->diff($lastUserAccess)->d > $this->params->get('course_access.time_limit');
    }
}
