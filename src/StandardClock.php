<?php

declare(strict_types=1);

namespace Bag2\Clock;

use DateTimeImmutable;
use PsrProposal\Clock\ClockInterface;

/**
 * Clock class implementation that returns DateTimeImmutable
 */
class StandardClock implements ClockInterface
{
    public function now(): DateTimeImmutable
    {
        return new DateTimeImmutable();
    }
}
