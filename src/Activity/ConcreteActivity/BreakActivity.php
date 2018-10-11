<?php

namespace OneFit\Activity\ConcreteActivity;

use OneFit\Activity\AbstractActivity;
use OneFit\Activity\ActivityInterface;
use OneFit\Activity\ActivityType;

/**
 * Class BreakActivity
 * @package OneFit\Activity\ConcreteActivity
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
final class BreakActivity extends AbstractActivity implements ActivityInterface
{
    /** @inheritdoc */
    public static function getName(): string
    {
        return 'Break';
    }

    /** @inheritdoc */
    public static function getType(): string
    {
        return ActivityType::TYPE_BREAK;
    }
}
