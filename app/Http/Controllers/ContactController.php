<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
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
}
