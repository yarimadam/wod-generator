<?php

namespace OneFit\Exercise\ConcreteExercise;

use OneFit\Activity\ActivityInterface;
use OneFit\Activity\ActivityType;
use OneFit\Exercise\AbstractExercise;

/**
 * Class RingExercise
 * @package OneFit\Exercise\ConcreteExercise
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
final class RingExercise extends AbstractExercise implements ActivityInterface
{
    /**
     * RingExercise constructor.
     */
    public function __construct()
    {
        $this->name = 'Ring';
        $this->type = ActivityType::TYPE_NONCARDIO;
    }
}
