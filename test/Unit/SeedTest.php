<?php
namespace PHPUnitSeed\Test\Unit;

use PHPUnitSeed\Framework\TestCase;

/**
 * @package PHPUnitSeed\Test
 * @author  icanhazstring <blubb0r05+github@gmail.com>
 */
class SeedTest extends TestCase
{
    public static function setUpBeforeClass()
    {
        if (!defined('PHPUNIT_SEED')) {
            define('PHPUNIT_SEED', 1);
        }
    }

    /**
     * @test
     */
    public function itShouldResultInSameResult()
    {
        $name = $this->fake()->name();
        $this->assertEquals($name, $this->fake()->name());

        $number = $this->fake()->numberBetween(0, 22);
        $this->assertEquals($number, $this->fake()->numberBetween(0, 22));
    }
}
