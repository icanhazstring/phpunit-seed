<?php
namespace PHPUnitSeed\Test\Provider;

use Faker\Provider\Base;

/**
 * CustomProvider
 *
 * Provider for unit tests
 *
 * @package PHPUnitSeed\Test\Provider
 * @author  icanhazstring <blubb0r05+github@gmail.com>
 */
class CustomProvider extends Base
{
    public function custom($nbWords = 5)
    {
        $sentence = $this->generator->sentence($nbWords);

        return substr($sentence, 0, strlen($sentence) - 1);
    }
}
