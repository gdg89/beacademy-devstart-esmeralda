<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserFormRequest;
use App\Models\User;
use Illuminate\Routing\Route;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user): View
    {
        return view('user.show', compact('user'));
    }

    public function login(): View
    {
        return view('user.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $states = User::getStates();

        return view('user.create', compact('states'));
    }

    public function store(StoreUserFormRequest $request)
    {
        $data = $request->validated();

        $data['password'] = bcrypt($data['password']);

        User::create($data);

        if ($request->origin === 'admin.users.create') {
            return redirect()->route('admin.users.index');
        }

        return redirect()->route('login');
    }

    public function edit(User $user)
    {
        $states = User::getStates();

        return view('user.edit', compact('user', 'states'));
    }

    public function update(StoreUserFormRequest $request, User $user)
    {
        $data = $request->validated();

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

        return redirect()->route('user.index', $user->id);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index');
    }
}
