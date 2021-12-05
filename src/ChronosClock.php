<?php

declare(strict_types=1);

namespace Bag2\Clock;

use Cake\Chronos\Chronos;
use DateTimeImmutable;
use Psr\Clock\ClockInterface;

class ChronosClock implements ClockInterface
{
    /**
     * @return Chronos
     */
    public function now(): DateTimeImmutable
    {
        return new Chronos();
    }
}
