<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\ResponseMessage;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    public function setRegister(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:8'
        ]);

        $user = User::create([
            'name' => $request->name
        ]);

        return response()->json([
            'id' => $user->id
        ]);
    }

    public function index($id)
    {
        $messages = Message::where('user_id', $id)->get();
        $responses = ResponseMessage::where('user_id', $id)->get();

        $user = User::where('id', $id)->first();

        $combinedData = $messages->concat($responses);
        $sortedData = $combinedData->sortBy('created_at');

        return response()->json([
            'user' => $user,
            'sortedData' => $sortedData
        ]);
    }

    public function store(Request $request)
    {
        Message::create([
            'user_id' => $request->user_id,
            'message' => $request->message,
        ]);

        return response()->json([
            'id' => $request->user_id
        ]);
    }
}