<?php

namespace App\Http\Controllers;

use App\Business\Models\Users;
use App\Business\Utilities\Pagination;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public static function chatReceiverSelect2(Request $request)
    {
        $query = User::select2()
            ->whereNotIn('id', [auth()->id()])
            ->whereDoesntHave('chat_receiver', fn($q) => $q->where('chats.sender_id', auth()->id()));

//        if (auth()->user()->isAdmin()) {
//            $query->scopes('notAdmin');
//        } elseif (auth()->user()->isConsultant()) {
//            $query->scopes('notConsultant');
//        } elseif (auth()->user()->isWorker()) {
//            $query->scopes('notWorker');
//        }

        $query = Users::filter($query, [...$request->all(), 'search' => $request->term]);
        return Pagination::infinite($query, $request->all());
    }
}
