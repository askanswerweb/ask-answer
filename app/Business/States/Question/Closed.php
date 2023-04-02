<?php

namespace App\Business\States\Question;

class Closed extends QuestionState
{
    public static string $name = 'closed';

    public function getName(): string
    {
        return self::$name;
    }

    public function color(): string
    {
        return 'danger';
    }
}
