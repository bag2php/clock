<?php

declare(strict_types=1);

namespace PsrProposal\Clock;

use DateTimeImmutable;

interface ClockInterface
{
    public function now(): DateTimeImmutable;
}
