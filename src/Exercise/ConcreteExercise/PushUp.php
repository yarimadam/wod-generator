<?php

namespace OneFit\Exercise\ConcreteExercise;

use OneFit\Exercise\AbstractExercise;
use OneFit\Exercise\ExerciseType;

/**
 * Class PushUp
 * @package OneFit\Execise\ConcreteExercise
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
class PushUp extends AbstractExercise
{
    /**
     * PushUp constructor.
     */
    public function __construct()
    {
        $this->name = 'Push Up';
        $this->type = ExerciseType::NONCARDIO;
    }
}
