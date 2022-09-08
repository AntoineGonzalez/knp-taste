<?php

declare(strict_types=1);

namespace App\Entity;

use App\Enum\VoteOption;
use DateTimeImmutable;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Uid\Uuid;

class Vote
{
    private readonly Uuid $id;

    /**
     * @param ?Collection<Application> $applications
     */
    public function __construct()
    {
        $this->id = Uuid::v4();
    }
}
