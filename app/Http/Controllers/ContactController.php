<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use App\Http\Resources\MessageResource;
use App\Http\Resources\UserResource;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getContacts(){
        $users = User::where('id', '<>', auth()->user()->id)->get();

        return response([
            'result' => UserResource::collection($users),
            'auth_id' => auth()->user()->id
        ], 200);
    }

    public function getMessages(User $contact){
        $messages = Message::where([
            ['from', auth()->user()->id],
            ['to', $contact->id]
        ])->orWhere([
            ['from', $contact->id],
            ['to', auth()->user()->id]
        ])->orderBy('created_at','ASC')->get();
        return MessageResource::collection($messages);
    }

    public function sendMessage(User $contact){
        request()->validate(['message' => ['required', 'string']]);

        if(!$contact)
            return response()->json(['message' => 'No valid recipient.'],413);

        $message = auth()->user()->sendMessage($contact, request('message'));
        broadcast(new NewMessage($message));

        return response()->json([
            'message' => 'Successfully sent message to '.$contact->name,
            'result' => new MessageResource($message)
        ], 200);
    }
}
