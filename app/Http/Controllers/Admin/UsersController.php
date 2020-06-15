<?php

namespace App\Http\Controllers\Admin;

use App\Entity\User;
use App\Http\Requests\Admin\User\UpdateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Str;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin-panel');
    }

    public function index(Request $request)
    {

        $query = User::orderByDesc('id');

        if (!empty($value = $request->get('id'))) {
            $query->where('id', $value);
        }

        if (!empty($value = $request->get('name'))) {
            $query->where('name', 'like', '%' . $value . '%');
        }

        if (!empty($value = $request->get('email'))) {
            $query->where('email', 'like', '%' . $value . '%');
        }

        if (!empty($value = $request->get('status'))) {
            $query->where('status', $value);
        }

        if (!empty($value = $request->get('role'))) {
            $query->where('role', $value);
        }
        $statuses = [
            User::STATUS_WAIT => 'wait',
            User::STATUS_ACTIVE => 'active'
        ];
        $roles = [
            User::ROLE_USER => 'user',
            User::ROLE_ADMIN => 'admin'
        ];
//        $users = User::orderBy('id', 'desc')->paginate(10);
        $users = $query->paginate(10);
        return view('admin.users.index', compact('users', 'statuses', 'roles'));
    }

    public function create()
    {
        return view('admin.users.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
           'name' => 'required | string | max:255',
           'email' => 'required | string | max:255 | email | unique:users',
           'password' => 'string | max:255 ',
        ]);

        $user = User::create($request->only(['name', 'email']) + [
           'password' => bcrypt($request['password'] ?? Str::random()),
            'status' => User::STATUS_WAIT,
            ]);

        return redirect()->route('admin.users.show', $user);
    }

    public function show(User $user)
    {

        return view('admin.users.show', compact('user'));
    }


    public function edit(User $user)
    {

        $roles = [
            User::ROLE_USER => 'user',
            User::ROLE_ADMIN => 'admin'
        ];

        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(UpdateRequest $request, User $user)
    {

        $user->update($request->only(['name', 'email','role']));
        return redirect()->route('admin.users.show', $user);
    }


    public function destroy(User $user)
    {
//        $user->delete();
        return redirect()->route('admin.users.index');
    }
    public function verify(User $user)
    {
        $user->verify();

        return redirect()->route('admin.users.show', $user);
    }
}
