<?php

namespace OneFit\Exercise\ConcreteExercise;

use OneFit\Exercise\AbstractExercise;
use OneFit\Exercise\ExerciseType;

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
