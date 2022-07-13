<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\UserFormRequest;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index():View
    {
        return view('user.index');
    }

    public function login():View
    {
        return view('user.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create():View
    {
        $states = User::state();
        return view('user.register',compact('states'));
    }

    public function store(UserFormRequest $request)
    {
        $validated = $request->validated();
        User::create($validated);
        dd($validated);

        // return redirect()
    }

    public function show(User $user)
    {
        //
    }
}
