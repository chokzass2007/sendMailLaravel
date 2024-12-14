<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\Controller;

Route::get('/', function () {
    return view('welcome');
});




// Route::get('/test', [MailController::class, 'sendWelcomeEmail']);