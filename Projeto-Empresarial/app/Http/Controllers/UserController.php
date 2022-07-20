<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserFormRequest;
use App\Models\User;

use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        return view('user.index');
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
        $input = $request->validated();

        User::create($input);

        return redirect()->route('login');
    }

    public function show(User $user)
    {
        //
    }
}
