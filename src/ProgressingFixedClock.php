<?php

namespace Bag2\Clock;

use function explode;
use function microtime;
use DateInterval;
use DateTimeImmutable;
use PsrProposal\Clock\ClockInterface;

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

    /**
     * @var string
     */
    private $origin_msec;

    /**
     * @var string
     */
    private $origin_sec;

    /**
     * @phpstan-param T
     * @param string $microtime A return value of {@see microtime()} function.
     */
    public function __construct(DateTimeImmutable $datetime, string $microtime)
    {
        $this->datetime = $datetime;
        [$msec, $sec] = explode(' ', $microtime, 2);
        $this->origin_msec = $msec;
        $this->origin_sec = $sec;
    }

    /**
     * @phpstan-return T
     */
    public function now(): DateTimeImmutable
    {
        [$now_msec, $now_sec] = explode(' ', microtime(), 2);

        if ($this->origin_sec === $now_sec) {
            return $this->datetime;
        }

        $diff = $now_sec - $this->origin_sec;

        return $this->datetime->add(new DateInterval("PT{$diff}S"));
    }
}
