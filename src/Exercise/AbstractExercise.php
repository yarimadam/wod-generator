<?php

namespace OneFit\Exercise;

use OneFit\Activity\AbstractActivity;
use OneFit\Activity\ActivityCategory;

/**
 * Class Exercise
 * @package OneFit\Execise
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
abstract class AbstractExercise extends AbstractActivity
{
    /** @inheritdoc */
    public function getCategory(): string
    {
        return ActivityCategory::CATEGORY_EXERCISE;
    }
}
