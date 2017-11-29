<?php

namespace PHPUnitSeed\Test\Unit\Util;

use Faker\Provider;
use PHPUnitSeed\Framework\TestCase;
use PHPUnitSeed\Util\ArrayUtil;

/**
 * Class ProviderDiffTest
 *
 * @package PHPUnitSeed\Test\Unit\Util
 * @author  icanhazstring <blubbor05+github@gmail.com>
 */
class ArrayUtilTest extends TestCase
{
    /**
     * @test
     */
    public function itShouldIgnoreLocaleProviderInDiff()
    {
        $lorem = new Provider\Lorem($this->fake());
        $company = new Provider\Company($this->fake());

        $a = [
            $lorem,
            new Provider\ar_JO\Address($this->fake()),
            $company
        ];

        $b = [
            $lorem,
            new Provider\de_DE\Address($this->fake()),
            new Provider\de_DE\Company($this->fake()),
            new Provider\sr_Latn_RS\Payment($this->fake())
        ];

        $this->assertEquals([$company], ArrayUtil::diffProvider($a, $b));
    }
}
