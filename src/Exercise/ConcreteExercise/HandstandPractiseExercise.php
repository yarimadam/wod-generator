<?php

namespace OneFit\Exercise\ConcreteExercise;

use OneFit\Activity\ActivityInterface;
use OneFit\Activity\ActivityType;
use OneFit\Exercise\AbstractExercise;

/**
 * Class HandstandPractiseExercise
 * @package OneFit\Exercise\ConcreteExercise
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
final class HandstandPractiseExercise extends AbstractExercise implements ActivityInterface
{
    /** @inheritdoc */
    public static function getName(): string
    {
        return 'Handstand Practise';
    }

    /** @inheritdoc */
    public static function getType(): string
    {
        return ActivityType::TYPE_NONCARDIO;
    }
}
