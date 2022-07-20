<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StoreUsersFormRequest;

class AdminUsersController extends Controller
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

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(StoreUsersFormRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);

        $this->model->create($data);

        return redirect()->route('admin.users.index');
    }

    public function edit($id)
    {
        if (!$user = $this->model->find($id)) {
            return redirect()->route('admin.users.index');
        }
        return view('admin.users.edit', compact('user'));
    }

    public function update(StoreUsersFormRequest $request, $id)
    {

        if (!$user = $this->model->find($id)) {
            return redirect()->route('admin.users.index');
        }

        $data = $request->all();

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }


        if (!$request->password) {
            unset($data['password']);
        }
        // unset($data['password']);


        $user->update($data);
        return redirect()->route('admin.users.index', $user->id);
    }




    public function destroy($id)
    {
        if (!$user = $this->model->find($id)) {
            return redirect()->route('admin.users.index');
        }
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}
