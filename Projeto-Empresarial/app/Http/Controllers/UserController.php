<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreUserFormRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user): View
    {
        $user->avatar = User::getUserAvatarPath($user);

        return view('user.show', compact('user'));
    }

    /**
     * Show the form for creating a new user.
     *
     * @return View
     */
    public function create(): View
    {
        $states = config('states');
        return view('user.create', compact('states'));
    }

    public function store(StoreUserFormRequest $request)
    {
        $data = $request->all();

        $data['password'] = bcrypt($data['password']);

        if ($data['avatar']->isValid()) {
            $path = $data['avatar']->store('users_avatars', 'public');
            $data['avatar'] = $path;
        }

        User::create($data);

        if ($request->origin === 'admin.users.create') {
            return redirect()->route('admin.users.index');
        }

        return redirect()->route('login');
    }

    public function edit(User $user)
    {
        $states = User::getStates();

        $user->avatar = User::getUserAvatarPath($user);

        return view('user.edit', compact('user', 'states'));
    }

    public function update(StoreUserFormRequest $request, User $user)
    {
        $data = $request->validated();

        if (!empty($data['avatar']) && $data['avatar']->isValid()) {
            Storage::delete("public/{$user->avatar}" ?? '');
            $path = $data['avatar']->store('users_avatars', 'public');
            $data['avatar'] = $path;
        }

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        if (!$request->password) {
            unset($data['password']);
        }

        $user->update($data);

        if ($request->origin === 'admin.users.edit') {
            return redirect()->route('admin.users.index');
        }

        return redirect()->route('user.show', $user->id);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index');
    }
}
