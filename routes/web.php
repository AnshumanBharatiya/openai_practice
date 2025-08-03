<?php

use App\Livewire\ChatApp;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatAppController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/chatapp', [ChatAppController::class, 'index']);
Route::post('/chatappv1', [ChatAppController::class, 'store1']);
Route::post('/chatapp', [ChatAppController::class, 'store']);
Route::get('/chatapp/reset', function () {
    session()->forget('chat_history');
    return redirect('/chatapp');
});

// Route::get("chat-app", ChatApp::class)->name("chat-app");