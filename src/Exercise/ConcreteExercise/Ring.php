<?php

namespace OneFit\Exercise\ConcreteExercise;

use OneFit\Exercise\AbstractExercise;
use OneFit\Exercise\ExerciseType;

/**
 * Class Ring
 * @package OneFit\Execise\ConcreteExercise
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
class Ring extends AbstractExercise
{
    /**
     * Ring constructor.
     */
    public function __construct()
    {
        $this->name = 'Ring';
        $this->type = ExerciseType::NONCARDIO;
    }
}
