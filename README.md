# phpunit-seed

[![Build Status](https://api.travis-ci.org/icanhazstring/phpunit-seed.svg?branch=master)](https://travis-ci.org/icanhazstring/phpunit-seed)

phpunit extenstion with [fzaninotto/Faker](https://github.com/fzaninotto/Faker) integration

## Installation

To install this extension, simply use `composer`.

```bash
$ composer require --dev icanhazstring/phpunit-seed:^0.2
```

## Usage

To use this extension, make sure your tests derive from 
`PHPUnitSeed\Framework\TestCase` instead of the `PHPUnit` default.

This will add a new function `fake()` into your test suites.

```php
class SuperTest extends PHPUnitSeed\Framework\Testcase
{
    public function testAwesome()
    {
        $name = $this->fake()->name();
        $this->assertEquals($name, $this->fake()->name());
        // should work
    }
}
```

## Run tests with seed

To execute all your tests with `random` or `specific` seeds use the deliverd binary.

```bash
$ vendor/bin/phpunit-seed [--seed=<int>]
```

You will get an output similar to this

```bash
$ vendor/bin/phpunit-seed -c phpunit.xml
PHPUnit 6.4.3 by Sebastian Bergmann and contributors.

.                                                                   1 / 1 (100%)

Time: 128 ms, Memory: 6.00MB

OK (1 test, 2 assertions)

Randomized with seed: 1234
```

In the last output line you will see the seed number which was used for this execution.
If you want to execute the same tests, with same `random` values, use the `--seed=<int>` argument
for the binary.

## Faker Documentation
For a full usage on `Faker` see [fzaninotto/Faker](https://github.com/fzaninotto/Faker)
