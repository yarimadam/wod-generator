<?php

namespace OneFit\Activity;

/**
 * Class AbstractActivity
 * @package OneFit\Activity
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
abstract class AbstractActivity implements ActivityInterface
{
    /** @inheritdoc */
    public function getCategory(): string
    {
        return ActivityCategory::CATEGORY_OTHER;
    }
}
