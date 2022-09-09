<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\User;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;

class CourseGuardService
{
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
            $authUser->getCourseVisitCounter() < 10 ||
            $currentDatetime->diff($lastUserAccess)->s > 10;
    }
}
