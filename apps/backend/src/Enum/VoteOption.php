<?php

declare(strict_types=1);

namespace App\Enum;

enum VoteOption
{
    case Yes;
    case No;
    case Abstain;
}
