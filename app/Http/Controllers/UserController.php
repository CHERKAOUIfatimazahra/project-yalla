<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(5);
        
        return view('dashbord.users.index',compact('users'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('dashbord.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'current_password' => 'nullable|string',
        'new_password' => 'nullable|string|min:3',
    ]);

    $user->name = $request->name;
    $user->email = $request->email;
    
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        $user->image = $imageName;
    }

    // Check if current_password is provided and matches the user's actual password
    if (!empty($request->current_password) && Hash::check($request->current_password, $user->password)) {
        // Hash and update the new password
        $user->password = Hash::make($request->new_password);
    }

    $user->save();

    return redirect()->back()->with('success', 'User profile updated successfully.');
}
}
