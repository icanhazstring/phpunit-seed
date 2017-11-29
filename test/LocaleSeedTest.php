<?php
namespace PHPUnitSeed\Test;

use Faker\Factory;
use PHPUnitSeed\Framework\TestCase;

/**
 * Class LocaleSeedTest
 *
 * @package PHPUnitSeed\Test
 * @author  Andreas Frömer <andreas.froemer@check24.de>
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
}
