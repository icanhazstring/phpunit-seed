<?php

namespace PHPUnitSeed\TextUI;

use PHPUnit\Framework\Test;

/**
 * @package PHPUnitSeed\TextUI
 * @author  icanhazstring <blubb0r05+github@gmail.com>
 */
class TestRunner extends \PHPUnit\TextUI\TestRunner
{
    public function doRun(Test $suite, array $arguments = [], $exit = true)
    {
        $this->addPrinter($arguments);

        return parent::doRun($suite, $arguments, $exit);
    }

    /**
     * Add our customer printer
     *
     * @param array $arguments
     */
    protected function addPrinter(array $arguments)
    {
        $printer = new ResultPrinter(
            $arguments['seed'],
            null,
            $arguments['verbose'] ?? false,
            $arguments['colors'] ?? \PHPUnit\TextUI\ResultPrinter::COLOR_DEFAULT,
            $arguments['debug'] ?? false,
            $arguments['columns'] ?? 80,
            $arguments['reverseList'] ?? false
        );

        // Make sure printer arguments is still working
        $this->printer = $arguments['printer'] ?? $printer;
    }
}
