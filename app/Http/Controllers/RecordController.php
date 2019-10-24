<?php

namespace App\Http\Controllers;
use App\Models\Music;
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

    public function storeApi(Request $request) {
        $data = $request->json()->all();
        $unknown_musics=[];
        foreach($data as $record){
            $mus = Music::where('name', $record['title'])->first();
            if($mus===NULL){
                $unknown_musics[]=$record['title'];
                continue;
            }
            try{
                $rec = Record::create([
                    'music_id' => $mus->id,
                    'store' => $record['store'],
                    'time' => Carbon::createFromFormat('Y/m/d H:i', $record['time']),
                    'level' => $record['level'],
                    'jc_cnt' => $record['critical'],
                    'cr_cnt' => $record['justice'],
                    'at_cnt' => $record['attack'],
                    'ms_cnt' => $record['miss'],
                    'max_cmb' => $record['combo'],
                    'track_no' => $record['track'],
                ]);
            }catch(QueryException $e){}
        }

        $unknown_musics = array_unique($unknown_musics);
        $unknown_musics = array_values($unknown_musics);
        return response()->json(['unknowns' => $unknown_musics]);
    }
}
