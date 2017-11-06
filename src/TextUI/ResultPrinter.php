<?php

namespace PHPUnitSeed\TextUI;

use PHPUnit\Framework\TestResult;

/**
 * @package PHPUnitSeed\TextUI
 * @author  icanhazstring <blubb0r05+github@gmail.com>
 */
class ResultPrinter extends \PHPUnit\TextUI\ResultPrinter
{
    /** @var int */
    protected $seed;

    /**
     * @inheritdoc
     */
    public function __construct(
        $seed,
        $out = null,
        $verbose = false,
        $colors = \PHPUnit\TextUI\ResultPrinter::COLOR_DEFAULT,
        $debug = false,
        $numberOfColumns = 80,
        $reverse = false
    ) {
        parent::__construct($out, $verbose, $colors, $debug, $numberOfColumns, $reverse);
        $this->seed = $seed;
    }

    /**
     * @inheritdoc
     */
    protected function printFooter(TestResult $result)
    {
        parent::printFooter($result);

        $this->writeNewLine();
        $this->write("Randomized with seed: {$this->seed}");
        $this->writeNewLine();
    }
}
