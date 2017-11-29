<?php

namespace PHPUnitSeed\Util;

/**
 * Class ProviderDiff
 *
 * @package PHPUnitSeed\Util
 * @author  icanhazstring <blubb0r05+github@gmail.com>
 */
class ArrayUtil
{
    /**
     * Create array diff on Faker Provider.
     *
     * This will ignore provider in locale namespace.
     *
     * @param array $a
     * @param array $b
     * @return array
     */
    public static function diffProvider(array $a, array $b)
    {
        $localeFilter = function ($item) {
            return !preg_match('/[a-z]{2}(?:_[A-Za-z]{4})?_[A-Z]{2}/', get_class($item));
        };

        $a = array_filter($a, $localeFilter);
        $b = array_filter($b, $localeFilter);

        $diff = array_udiff($a, $b, function ($a, $b) {
            return get_class($a) <=> get_class($b);
        });

        // Reset index
        return array_merge([], $diff);
    }
}
