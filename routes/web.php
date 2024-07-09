<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessagesController;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('messages', MessagesController::class);

Route::post('store', [MessagesController::class, 'store'])->name('storeConversations');

Route::get('getConversations', [MessagesController::class, 'getConversations'])->name('getConversations');

Route::get('/delete-message/{id}', [MessagesController::class, 'delete'])->name('deleteMessage');

Route::get('/open-new-page', [MessagesController::class, 'openNewPage'])->name('open.new.page');

Route::get('/profile', function () {
    return view('profile'); 
});
Route::post('update-profile',[MessagesController::class,'updateProfile'])->name('update-profile');

Route::post('/update-timestamp', [MessagesController::class,'updateTimestamp'])->name('updateTimestamp');

Route::get('/load-chat/{userId}', [MessagesController::class, 'loadChat'])->name('loadChat');

Route::post('/typing-status', [MessagesController::class, 'update'])->name('typing-status.update');

Route::get('/check-typing-status', [MessagesController::class, 'checkTypingStatus']);

Route::post('/update-last-seen', [MessagesController::class, 'updateLastSeen'])->name('update.last.seen');

Route::get('/check-last-seen', [MessagesController::class, 'checkLastSeen']);

Route::post('/update-seen-status', [MessagesController::class, 'updateSeenStatus'])->name('updateSeenStatus');

Route::post('/update-background-image/{user_id}', [MessagesController::class, 'updateBackgroundImage']);

Route::put('/messages/{id}', [MessagesController::class, 'update'])->name('messages.update');

Route::delete('/messages/{id}', [MessagesController::class, 'destroy'])->name('messages.destroy');

Route::post('/save-react', [MessagesController::class, 'saveReact'])->name('save-react');

Route::get('/get-last-message', [MessagesController::class, 'getLastMessage'])->name('getLastMessage');