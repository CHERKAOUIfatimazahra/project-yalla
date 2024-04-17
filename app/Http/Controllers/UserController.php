<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = $this->userRepository->all();

        return view('dashbord.users.index', compact('users'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function edit(User $user)
    {
        return view('dashbord.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'current_password' => 'nullable|string',
            'new_password' => 'nullable|string|min:3',
        ]);

        $this->userRepository->update($user, $data);

        return redirect()->back()->with('success', 'User profile updated successfully.');
    }
    public function destroy(User $user)
    {
        $this->userRepository->delete($user);

        return redirect()->back()->with('success', 'User deleted successfully.');
    }
}
