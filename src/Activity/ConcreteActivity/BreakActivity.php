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
    /**
     * BreakActivity constructor.
     */
    public function __construct()
    {
        $this->name = 'Break';
        $this->type = ActivityType::TYPE_BREAK;
    }
}
