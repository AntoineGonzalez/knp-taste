<?php

declare(strict_types=1);

namespace App\Entity;

use Symfony\Component\Uid\Uuid;

class Application
{
    private Uuid $id;

    public function __construct()
    {
        $this->id = Uuid::v4();
    }
}
