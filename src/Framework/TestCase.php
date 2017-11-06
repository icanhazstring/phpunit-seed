<?php

namespace PHPUnitSeed\Framework;

use Faker\Factory;
use Faker\Generator;

/**
 * Add Faker into phpunit Testcase
 *
 * @package PHPUnitSeed
 * @author  icanhazstring <blubb0r05+github@gmail.com>
 */
class TestCase extends \PHPUnit\Framework\TestCase
{
    /** @var Generator */
    private $faker;

    /**
     * @return Generator
     */
    protected function getFaker()
    {
        if ($this->faker === null) {
            $this->faker = Factory::create();
        }

        if (defined('PHPUNIT_SEED') && PHPUNIT_SEED) {
            $this->faker->seed(PHPUNIT_SEED);
        }

        return $this->faker;
    }
}
