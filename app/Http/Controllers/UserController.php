<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        return view('management');
    }

    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();

        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect()
            ->route('management')
            ->with('status','User created successfully!');
    }   

    public function index()
    {
         // Simple list with pagination
    $users = User::latest()->paginate(10);

    $q = request('q');
    $users = User::query()
        ->when($q, fn($query) =>
            $query->where('firstname', 'like', "%{$q}%")
                  ->orWhere('lastname', 'like', "%{$q}%")
                  ->orWhere('email', 'like', "%{$q}%")
        )

        ->latest()
        ->paginate(10)
        ->withQueryString();

   

        return view('management', compact('users'));
    }

    public function updatePicture(Request $request)
    {
        $request->validate([
            'profilPicture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = auth()->user();
        if($user->profilePicture){
            Storage::disk('public')->delete(str_replace ($user->profilePicture));
        }

        $path = $request->file('profilePicture')->store('profiles', 'public');

        $user->update([
            'profilePicture' => $path
        ]);
    }
}
