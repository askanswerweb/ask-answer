<?php

namespace App\Business\Models;

use App\Business\Utilities\Dates;
use App\Business\Utilities\Queries;
use App\Http\Enums\ActiveStatus;
use Illuminate\Http\Request;
use Illuminate\Contracts\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Eloquent\Builder;

class Users
{
    public static function filter(QueryBuilder|Builder $query, array $options = []): QueryBuilder|Builder
    {
        $options = collect($options);

        if ($id = $options->get('user_id')) {
            $query->where('users.id', $id);
        }

        if ($role = $options->get('role')) {
            $query->where('users.role', $role);
        }

        if ($status = $options->get('status')) {
            $query->where('users.status', $status);
        }

        if ($username = $options->get('username')) {
            $query->whereRaw(Queries::like('users.username', $username));
        }

        if ($name = $options->get('name')) {
            $query->whereRaw(Queries::like('users.name', $name));
        }

        if ($search = $options->get('search')) {
            $query->where(function ($query) use ($search) {
                $query->where('users.id', $search);
                $query->orWhereRaw(Queries::like('users.username', $search));
                $query->orWhereRaw(Queries::like('users.name', $search));
            });
        }

        Dates::filter($query, [
            'date_from' => $options->get('date_from'),
            'date_to' => $options->get('date_to'),
            'column' => $options->get('date_column', 'users.created_at'),
        ]);

        return $query;
    }

    public static function credentials(Request $request): array
    {
        return [
            'username' => $request->username,
            'password' => $request->password,
            'status' => ActiveStatus::ACTIVE->value
        ];
    }
}
