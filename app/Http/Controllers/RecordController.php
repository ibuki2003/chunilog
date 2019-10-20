<?php

namespace App\Http\Controllers;
use App\Models\Record;
use Illuminate\Http\Request;

class RecordController extends Controller {
    public function show(Record $record) {
        return view('record.show', ['record' => $record]);
    }
}
