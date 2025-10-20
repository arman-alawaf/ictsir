<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentReviewController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\NoticeController;


Route::get('/', function () { return view('welcome'); });

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::middleware(['auth','user-access:User'])->group(function(){
//   Route::get('/user', [HomeController::class, 'user_dashboard']);
// });


// ==========
// ADMIN HERE
// ========== 
Route::middleware(['auth','user-access:Admin'])->group(function(){
//   Route::get('/admin', [HomeController::class, 'admin_dashboard']);
    Route::resource('studentreviews', StudentReviewController::class);
    Route::resource('apps', AppController::class);
    Route::resource('notices', NoticeController::class);
});





Route::middleware(['auth'])->group(function(){
  Route::get('dashboard', [HomeController::class, 'dashboard']);
});








use Illuminate\Support\Facades\Mail;
Route::get('/test-email', function () {
    try {
        Mail::raw('Test Email Body.', function ($message) {
            $message->to('arman.alawaf@gmail.com')->subject('Test Email Subject');
        });
        return redirect()->to('/')->with('success', 'Mail sent successfully!');
    } catch (\Exception $e) {
        // return 'Error: ' . $e->getMessage();
        return redirect()->to('/')->with('error', 'Error');
    }
});

Route::get('/clear-all', function() { Artisan::call('optimize:clear'); return redirect()->to('/'); });
Route::get('/migrate-fresh', function() { Artisan::call('migrate:fresh'); return redirect()->to('/'); });
Route::get('/migrate-fresh-seed', function() { Artisan::call('migrate:fresh --seed'); return redirect()->to('/'); });