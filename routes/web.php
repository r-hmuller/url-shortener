<?php

use App\Http\Controllers\UrlController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/{url:shorten_url}', [UrlController::class, 'get']);

Route::get('/{url:shorten_url}/stats', [UrlController::class, 'stats']);
