<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('mail', [EmailController::class, 'sendEmail']);


Route::post('mailsend', [EmailController::class, 'MailSend'])->name('mail.send');