<?php
namespace PHPUnitSeed\TextUI;

/**
 * @package PHPUnitSeed\TextUI
 * @author  icanhazstring <blubb0r05+github@gmail.com>
 */
class Command extends \PHPUnit\TextUI\Command
{
    public function __construct()
    {
        $this->longOptions['seed='] = null;
    }

    /**
     * @inheritdoc
     */
    protected function handleArguments(array $argv)
    {
        parent::handleArguments($argv);

        foreach ($this->options[0] as $option) {
            switch ($option[0]) {
                case '--seed':
                    $this->arguments['seed'] = $option[1] ?: mt_rand(1, 9999);
                    break;
            }
        }

        // Make sure everytime we run tests we have a seed
        $this->arguments['seed'] = $this->arguments['seed'] ?? mt_rand(1, 9999);
        define('PHPUNIT_SEED', (int)$this->arguments['seed']);
    }

    /**
     * @inheritdoc
     */
    protected function createRunner()
    {
        return new TestRunner($this->arguments['loader']);
    }
}
