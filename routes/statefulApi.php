<?php

use Illuminate\Http\Request;

Route::middleware('chunithm_cors')->group(function () {
    Route::options('new_records', 'RecordController@empty');
    Route::post('new_records', 'RecordController@storeApi')
        ->middleware('auth')->name('record.api');
});
