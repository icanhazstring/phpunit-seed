<?php
namespace PHPUnitSeed\Test\Unit;

use PHPUnitSeed\Framework\TestCase;
use PHPUnitSeed\Test\Provider\CustomProvider;

/**
 * Class LocaleSeedTest
 *
 * @package PHPUnitSeed\Test
 * @author  icanhazstring <blubb0r05+github@gmail.com>
 */
class LocaleSeedTest extends TestCase
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
    public function itShouldChangeLocale()
    {
        $nameUS = $this->fake()->name;
        $nameUS2 = $this->fake()->name;
        $nameDE = $this->fake('de_DE')->name;

        $this->assertEquals($nameUS, $nameUS2);
        $this->assertEquals($nameUS, $this->fake()->name);
        $this->assertEquals($nameDE, $this->fake('de_DE')->name);

        $this->assertNotEquals($nameUS, $nameDE);
    }

    /**
     * @test
     */
    public function itShouldKeepCustomProviderWhenChangingLocale()
    {
        $this->fake()->addProvider(new CustomProvider($this->fake()));

        $value = $this->fake()->custom();

        $this->assertEquals($value, $this->fake('de_DE')->custom());
    }
}
