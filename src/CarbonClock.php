<?php

declare(strict_types=1);

namespace Bag2\Clock;

use Carbon\CarbonImmutable;
use DateTimeImmutable;
use Psr\Clock\ClockInterface;

class CarbonClock implements ClockInterface
{
    /**
     * @return Chronos
     */
    public function now(): DateTimeImmutable
    {
        return new CarbonImmutable();
    }
}
