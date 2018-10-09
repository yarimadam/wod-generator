<?php

namespace OneFit\Activity;

/**
 * Class AbstractActivity
 * @package OneFit\Activity
 * @author Halil Tuncay Üner <tuncayuner@gmail.com>
 */
abstract class AbstractActivity implements ActivityInterface
{
    /** @var string $name */
    protected $name;

    /** @var string $type */
    protected $type;

    /** @inheritdoc */
    public function getName(): string
    {
        return $this->name;
    }

    /** @inheritdoc */
    public function getType(): string
    {
        return $this->type;
    }

    /** @inheritdoc */
    public function getCategory(): string
    {
        return ActivityCategory::CATEGORY_OTHER;
    }
}