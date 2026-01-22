<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Models\User;
use App\Http\Controllers\UserController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', function() {
    $userCount = User::count();
    return view('dashboard', ['userCount'=> $userCount]);
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

Route::get('/management', function (){
    return view('management');
})->middleware('auth');

Route::middleware('auth')->group(function (){
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('users', [UserController::class, 'store'])->name('users.store');
});

Route::get('/management', function (){
    return view('management');
})->name('management');

Route::get('/users', [UserController::class, 'index'])->name('users.index');