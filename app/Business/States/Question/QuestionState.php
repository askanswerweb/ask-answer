<?php

namespace App\Business\States\Question;

use App\Business\Utilities\Models;
use Spatie\ModelStates\State;
use Spatie\ModelStates\StateConfig;

abstract class QuestionState extends State
{
    public static function config(): StateConfig
    {
        return parent::config()->default(Open::class)
            ->allowTransition(Open::class, Closed::class)
            ->allowTransition(Open::class, Resolved::class)
            ->allowTransition(Resolved::class, Open::class);
    }

    public function getTitle(): string
    {
        return __("states." . $this->getName());
    }

    public function html()
    {
        return Models::getStateHtml($this->getTitle(), $this->color(), true);
    }

    abstract public function getName(): string;

    abstract public function color(): string;
}
