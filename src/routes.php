<?php

use Illuminate\Support\Facades\Route;

Route::get('/werknhub/bienvenido', [
    'uses' => 'Nowyouwerkn\WerknHub\Controllers\WerknHubController@index',
    'as' => 'werknhub.index',
]);