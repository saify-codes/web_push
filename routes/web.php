<?php

use App\Http\Controllers\NotificationSendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::view('/home', 'home')->name('home');
    Route::post('/store-token', [NotificationSendController::class, 'updateDeviceToken'])->name('store.token');
});
Route::get('/send-web-notification', [NotificationSendController::class, 'sendNotification'])->name('send.web-notification');

Route::get('/op',fn()=>"ddd")->middleware('test');


require __DIR__.'/auth.php';
