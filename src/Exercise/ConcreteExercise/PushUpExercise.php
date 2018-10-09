<?php

namespace OneFit\Exercise\ConcreteExercise;

use OneFit\Activity\ActivityInterface;
use OneFit\Activity\ActivityType;
use OneFit\Exercise\AbstractExercise;

/**
 * Class PushUpExercise
 * @package OneFit\Exercise\ConcreteExercise
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
final class PushUpExercise extends AbstractExercise implements ActivityInterface
{
    /**
     * PushUpExercise constructor.
     */
    public function __construct()
    {
        $this->name = 'Push Up';
        $this->type = ActivityType::TYPE_NONCARDIO;
    }
}
