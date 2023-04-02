<?php

namespace App\Business\States\Question;

class Open extends QuestionState
{
    public static string $name = 'open';

    public function getName(): string
    {
        return self::$name;
    }

    public function color(): string
    {
        return 'primary';
    }
}
