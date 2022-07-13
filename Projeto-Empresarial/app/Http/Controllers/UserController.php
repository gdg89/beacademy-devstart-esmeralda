<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\UserFormRequest;
use App\Models\Address;
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
        // dd($validated);
        // dd($validated);
        $user = User::create([
            'name' => $request->validated('name'),
            'email' => $request->validated('email'),
            'phone' => $request->validated('phone'),
            'birthday' => $request->validated('birthday'),
            'cpf' => $request->validated('cpf'),
            'password' => bcrypt($request->validated('password'))
        ]);

        $Address = Address::create([
            'user_id' => $user->id,
            'street' => $request->validated('street'),
            'number' => $request->validated('number'),
            'neighbor' => $request->validated('neighbor'),
            'city' => $request->validated('city'),
            'state' => $request->validated('state'),
            'complement' => $request->validated('complement'),
        ]);

        return redirect()->route('home');
    }

    public function show(User $user)
    {
        //
    }
}
