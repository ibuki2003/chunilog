<?php

use Illuminate\Http\Request;

Route::middleware(['chunithm_cors'])->group(function () {
    Route::options('new_records', function () {
        return response()->json();
    });

    Route::post('new_records', 'RecordController@storeApi')->name('record.api');
});
