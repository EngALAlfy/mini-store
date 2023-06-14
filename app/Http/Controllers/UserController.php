<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Constants;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UpdateUserRolesRequest;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();

        $data["password"] = Hash::make(Constants::$default_password);

        $roles = $data['roles'];

        unset($data['roles']);

        $user = User::create($data);
        $user->roles()->attach($roles);

        $this->success();

        return redirect()->route('admin.users.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();

        $user->update($data);

        $this->success();

        return redirect()->route('admin.users.index');
    }

    public function destroy(User $user)
    {
        // if ($user()->email == "admin") {
        //     $this->error("all.cannot_delete_the_main_admin");
        //     $this->deleteId = null;
        //     return;
        // }


        if (User::count() <= 1) {
            $this->error("all.cannot_delete_last_user");
            $this->deleteId = null;
            return;
        }

        $user->delete();

        $this->success();
        return redirect()->route('admin.users.index');
    }
}
