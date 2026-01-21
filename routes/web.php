<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function() {
    return view('dashboard');
})->middleware('auth');

Route::get('/profile', function() {
    return view('profile');
})->middleware('auth')->name('profile');

Route::post('/profile', function (\Illuminate\Http\Request $request) {
    $request->validate([
        'firstname' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'email'
    ]);

    $user = auth()->user();
    $user->firstname = $request->firstname;
    $user->lastname = $request->lastname;
    $user->email = $request->email;
    $user->save();

    return back()->with('success', 'Profile updated successfully!');
})->middleware('auth');

Route::get('/settings', function ()
{
    return view('settings');
})->middleware('auth');