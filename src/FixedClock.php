<?php

namespace Bag2\Clock;

use DateTimeImmutable;
use Psr\Clock\ClockInterface;

/**
 * A clock class that return freezed time for testing.
 *
 * @template T of DateTimeImmutable
 */
class FixedClock implements ClockInterface
{
    /**
     * @var DateTimeImmutable
     * @phpstan-var T
     */
    private $datetime;

    /**
     * @phpstan-param T $datetime
     */
    public function __construct(DateTimeImmutable $datetime)
    {
        $this->datetime = $datetime;
    }

    /**
     * @phpstan-return T
     */
    public function now(): DateTimeImmutable
    {
        return $this->datetime;
    }
}
