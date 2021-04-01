<?php

namespace App;

use App\Service\Math;

abstract class BaseProblem
{

    protected int $resultValue = 0;
    protected $startTime;
    public string $description;

    /**
     * @var Math
     */
    protected Math $math;

    /**
     * BaseProblem constructor.
     * @param Math $math
     */
    public function __construct(Math $math)
    {
        $this->math = $math;

        $this->setStartTime();
        $this->execute();
        $this->displayResultValue();
        $this->displayExecuteTime();
    }

    public function setStartTime()
    {
        $this->startTime = microtime(true);
    }

    public function displayExecuteTime()
    {
        echo 'Time: ' . number_format((microtime(true) - $this->startTime), 4) . ' sec';
    }

    public function displayResultValue() {
        echo 'Result value: ' . $this->resultValue . "\n";
    }

    abstract function execute();

}
