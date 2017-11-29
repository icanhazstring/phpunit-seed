<?php

namespace PHPUnitSeed\Framework;

use Faker\Factory;
use Faker\Generator;
use PHPUnitSeed\Util\ArrayUtil;

/**
 * Add Faker into phpunit Testcase
 *
 * @package PHPUnitSeed
 * @author  icanhazstring <blubb0r05+github@gmail.com>
 */
class TestCase extends \PHPUnit\Framework\TestCase
{
    protected const FAKER_LOCALE = Factory::DEFAULT_LOCALE;

    /** @var string Holds current faker locale */
    private $fakerLocale;

    /** @var Generator */
    private $faker;

    /**
     * @param string $locale Faker locale
     *
     * @return Generator
     */
    private function getFaker($locale)
    {
        if ($this->faker === null || $locale !== $this->fakerLocale) {
            $providers = $this->faker ? $this->faker->getProviders() : [];

            $this->faker = Factory::create($locale);
            $this->fakerLocale = $locale;

            $diff = ArrayUtil::diffProvider($providers, $this->faker->getProviders());

            foreach ($diff as $provider) {
                $this->faker->addProvider($provider);
            }
        }

        if (defined('PHPUNIT_SEED') && PHPUNIT_SEED) {
            $this->faker->seed(PHPUNIT_SEED);
        }

        return $this->faker;
    }

    /**
     * @return Generator
     */
    protected function fake($locale = null)
    {
        return $this->getFaker($locale ?? static::FAKER_LOCALE);
    }
}
