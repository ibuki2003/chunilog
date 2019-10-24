<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller {
    public function show(User $user) {
        return view('user.show', ['user' => $user]);
    }

    public function recordList(User $user) {
        return view('user.records', ['user' => $user]);
    }

    public function settings(User $user) {
        if($user->id !== auth()->id()){
            return redirect(route('user.settings', ['user'=>auth()->id()]));
        }
        return view('user.settings');
    }

    public function showscript(User $user) {
        return view('user.script');
    }
}
