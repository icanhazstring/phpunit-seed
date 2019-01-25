# phpunit-seed

**DEPRECATED** in favor of [icanhazstring/phpunit-faker-extension](https://github.com/icanhazstring/phpunit-faker-extension)

[![Build Status](https://api.travis-ci.org/icanhazstring/phpunit-seed.svg?branch=master)](https://travis-ci.org/icanhazstring/phpunit-seed)

phpunit extenstion with [fzaninotto/Faker](https://github.com/fzaninotto/Faker) integration

## Installation

To install this extension, simply use `composer`.

```bash
$ composer require --dev icanhazstring/phpunit-seed
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

## Change Faker locale

You can change the locale of 'Faker' in two ways:

1. Change the `static FAKE_LOCALE` in your test class
    ```php
    class MyTestCase extends PHPUnitSeed\Framework\Testcase
    {
        protected static FAKE_LOCALE = 'de_DE';

         public function itShouldTestWithDELocale()
        {
            $name = $this->fake()->name; // will be name from de_DE provider
        }
    }
    ```
2. Call the `fake` method with your desired locale
    ```php
    class MyTestCase extends PHPUnitSeed\Framework\Testcase
    {
        public function itShouldTestWithDELocale()
        {
            $name = $this->fake('de_DE')->name; // will be name from de_DE provider
        }
    }
    ```

## Faker Documentation
For a full usage on `Faker` see [fzaninotto/Faker](https://github.com/fzaninotto/Faker)
