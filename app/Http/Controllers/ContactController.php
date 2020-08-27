<?php

namespace App\Http\Controllers;

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

        return UserResource::collection($users);
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
}
