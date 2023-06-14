<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        $data = $request->validated();

        if (Hash::check($data["old_password"], Auth::user()->password)) {
            Auth::user()->password = Hash::make($data["password"]);
            Auth::user()->save();
            $this->success();
            return back();
        }

        $this->error("all.wrong_old_password");
        return back();
    }

    public function update(UpdateProfileRequest $request)
    {
        $data = $request->validated();

        Auth::user()->update($data);
        Auth::user()->save();

        $this->success();
        return back();
    }

    public function destroy()
    {
        // if (Auth::user()->email == "admin") {
        //     $this->error("all.cannot_delete_the_main_admin");
        //     return back();
        // }


        User::find(Auth::id())->delete();
        $this->success("all.account_deleted_successfully");
        return redirect()->route('logout');
    }
}
