<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\ResponseMessage;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getDashboard()
    {
        $users = User::where('id', '<>', 1)->get();
        foreach ($users as $user) {
            $messages = Message::where('user_id', $user->id)->get();
            $responses = ResponseMessage::where('user_id', $user->id)->get();
        }

        $combinedData = $messages->concat($responses);
        $sortedData = $combinedData->sortBy('created_at');

        return response()->json([
            'users' => $users,
            'sortedData' => $sortedData
        ]);
    }

    public function setDashboard(Request $request)
    {
        ResponseMessage::create([
            'user_id' => $request->user_id,
            'message' => $request->message
        ]);

        return response()->json(['message' => 'Message created successfully']);
    }
}