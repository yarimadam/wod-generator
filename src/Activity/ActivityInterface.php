<?php

namespace OneFit\Activity;

/**
 * Class ActivityInterface
 * @package OneFit\Activity
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
interface ActivityInterface
{
    /** @return string Get activity name */
    public function getName(): string;

    /**
     * @return string Get activity type
     * @see ActivityType For complete list of activity types
     */
    public function getType(): string;

    /**
     * @return string Get category
     * @see ActivityCategory For complete list of categories
     */
    public function getCategory(): string;
}
