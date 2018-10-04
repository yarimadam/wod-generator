<?php

namespace OneFit\Execise\ConcreteExercise;

use OneFit\Execise\AbstractExercise;
use OneFit\Execise\ExerciseType;

/**
 * Class PullUp
 * @package OneFit\Execise\ConcreteExercise
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
class PullUp extends AbstractExercise
{
    /**
     * PullUp constructor.
     */
    public function __construct()
    {
        $this->name = 'Pull Up';
        $this->type = ExerciseType::NONCARDIO;
    }
}
