<?php

namespace App\Http\Controllers;
use App\Models\Record;
use Illuminate\Http\Request;
use App\User;

class RecordController extends Controller {
    public function show(User $user, Record $record) {
        if($user->id !== $record->user_id){
            return redirect(route('record.show', ['user'=>$record->user_id, 'record'=>$record]), 301);
        }
        return view('record.show', ['record' => $record]);
    }
}
