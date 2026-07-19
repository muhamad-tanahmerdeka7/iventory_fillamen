<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['role:Administrator'])->group(function () {

    Route::get('/backup', function () {
        return "Backup Database";
    });

    Route::get('/system-setting', function () {
        return "System Setting";
    });

});