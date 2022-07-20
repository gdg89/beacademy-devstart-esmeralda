<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StoreUsersFormRequest;
use Illuminate\View\View;

class AdminUserController extends Controller
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function index(Request $request)
    {
        $users = User::getAllFormatted($request);

        return view('admin.users.index', compact('users'));
    }
}
