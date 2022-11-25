<?php

declare(strict_types=1);

namespace Bag2\Clock;

use DateInterval;
use DateTimeImmutable;
use Psr\Clock\ClockInterface;
use function time;

/**
 * A clock class that returns the time progressed in real time from a fixed time for testing.
 *
 * @template T of DateTimeImmutable
 */
class ProgressingFixedClock implements ClockInterface
{
    /**
     * @var DateTimeImmutable
     * @phpstan-var T
     */
    private $datetime;

    /** @var int */
    private $origin_sec;

    /**
     * @phpstan-param T $datetime
     * @param int $sec A return value of {@see time()} function.
     */
    protected function __construct(DateTimeImmutable $datetime, int $sec)
    {
        $this->datetime = $datetime;
        $this->origin_sec = $sec;
    }

    /**
     * @phpstan-param T $datetime
     * @param int $sec A return value of {@see time()} function.
     * @return self<T>
     */
    public static function fromTime(DateTimeImmutable $datetime, int $sec): self
    {
        return new self($datetime, $sec);
    }

    /**
     * @phpstan-return T
     */
    public function now(): DateTimeImmutable
    {
        $now_sec = time();

        if ($this->origin_sec === $now_sec) {
            return $this->datetime;
        }

        $diff = $now_sec - $this->origin_sec;

        return $this->datetime->add(new DateInterval("PT{$diff}S"));
    }
}
