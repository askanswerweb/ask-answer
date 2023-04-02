<?php

namespace App\Business\States\Question;

class Resolved extends QuestionState
{
    public static string $name = 'resolved';

    public function getName(): string
    {
        return self::$name;
    }

    public function color(): string
    {
        return 'success';
    }
}
