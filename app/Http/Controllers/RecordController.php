<?php

namespace App\Http\Controllers;
use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Http\Requests\AddRecordRequest;
use App\User;
use Carbon\Carbon;

class RecordController extends Controller {
    public function __construct() {
        $this->middleware('auth')->only([
            'create',
            'store',
        ]);
    }
    public function show(User $user, Record $record) {
        if($user->id !== $record->user_id){
            return redirect(route('record.show', ['user'=>$record->user_id, 'record'=>$record]), 301);
        }
        return view('record.show', ['record' => $record]);
    }

    public function create(User $user) {
        if($user->id !== auth()->id()){
            return redirect(route('record.new', ['user'=>auth()->id()]));
        }
        return view('record.new');
    }

    public function store(User $user, AddRecordRequest $request) {
        $arr = $request->all();
        $arr['time'] = Carbon::parse($request->time)->toDateTimeString();
        try{
            $record = Record::create($arr);
        }catch(QueryException $e){
            // this should be caused only for unique constraint
            return redirect(route('record.new', ['user'=>auth()->id()]))->with('error', 'ui.record.already_exists')->withInput();
        }
        return redirect(route('record.new', ['user'=>auth()->id()]))->with('success', 'ui.record.created');
    }

    public function destroy(User $user, Record $record) {
        abort_unless($record->user_id === auth()->id(), 403);
        $record->delete();
        return redirect()->route('user.records', ['user' => auth()->id()]);
    }
}
