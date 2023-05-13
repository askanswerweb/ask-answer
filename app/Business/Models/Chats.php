<?php

namespace App\Business\Models;

use App\Business\Utilities\Dates;
use Illuminate\Contracts\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Builder;

class Chats
{
    public static function filter(QueryBuilder|Builder $query, array $options = []): QueryBuilder|Builder
    {
        $options = collect($options);

        if ($user_id = $options->get('user_id')) {
            $query->where(function ($query) use ($user_id) {
                $query->where('chats.sender_id', $user_id);
                $query->orWhere('chats.receiver_id', $user_id);
            });
        }

        if ($sender_id = $options->get('sender_id')) {
            $query->where('chats.sender_id', $sender_id);
        }

        if ($receiver_id = $options->get('receiver_id')) {
            $query->where('chats.receiver_id', $receiver_id);
        }

        Dates::filter($query, [
            'date_from' => $options->get('date_from'),
            'date_to' => $options->get('date_to'),
            'column' => $options->get('date_column', 'chats.created_at'),
        ]);

        return $query;
    }
}
