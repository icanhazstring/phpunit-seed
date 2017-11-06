<?php
namespace PHPUnitSeed\Test;

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
        $name = $this->getFaker()->name();
        $this->assertEquals($name, $this->getFaker()->name());

        $number = $this->getFaker()->numberBetween(0, 22);
        $this->assertEquals($number, $this->getFaker()->numberBetween(0, 22));
    }
}
