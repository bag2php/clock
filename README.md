# Bag2\Clock

A PSR-20 Clock implementation.

## Interface

This is the only method provided by the [PSR-20 Clock](https://www.php-fig.org/psr/psr-20/) interface.


```php
<?php

namespace Psr\Clock;

interface ClockInterface
{
    /**
     * Returns the current time as a DateTimeImmutable Object
     */
    public function now(): \DateTimeImmutable;

}
```

### Interoperability with DateTime Libraries

Today, [Carbon](https://github.com/briannesbitt/Carbon) and [Chronos](https://github.com/cakephp/chronos) are known as useful libraries that extend the `DateTime` class.

Both provide classes that extend from `DateTimeImmutable`, so it's easy to get an adapter.

 * [`CarbonClock`](https://github.com/bag2php/clock/blob/master/src/CarbonClock.php)
 * [`ChronosClock`](https://github.com/bag2php/clock/blob/master/src/ChronosClock.php)

If the PSR defines the Clock interface, it is convenient for these adapters to be shipped with their respective libraries for the user.

### DateTime for Testing

Writing tests for time-dependent functions is hard. Clock Interface is one of the solutions for that.

However, this requires the application to remove the `new DateTime()` (no arguments) and the time functions (`date()`, `time()`, `strtotime()`).

Other options are [php-timecop](https://github.com/hnw/php-timecop), [`Chronos::setTestNow()`](https://book.cakephp.org/chronos/1/en/index.html#testing-aids), [`Carbon::setTestNow()`](https://carbon.nesbot.com/docs/#api-testing) and [rashidlaasri/travel](https://github.com/rashidlaasri/travel).  However, they are not object-oriented as they depend on global state (or static properties).

#### Testing helper classes

 * [`FixedClock`](https://github.com/bag2php/clock/blob/master/src/FixedClock.php)
 * [`ProgressingFixedClock`](https://github.com/bag2php/clock/blob/master/src/ProgressingFixedClock.php)
