<?php

namespace App\Http\Controllers;

use App\helpers\UserHelper;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::where('silent', false)->get();
        return view('auth.users', [
            'users' => $users,
            'onlineUsers' => UserHelper::onlineUsers()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function update(Request $request, $id)
    {
        $status = User::where('id', $id)->pluck('approved')->toArray();
        $updateStatus = (boolean) $status[0] ? false : true;
        $message = $updateStatus ? trans('users.unlocked') : trans('users.locked');

        User::where('id', $id)
            ->update([
                'approved' => $updateStatus,
            ]);

        return view('auth.users', [
            'users' => User::all(),
            'info' => $message,
            'onlineUsers' => UserHelper::onlineUsers()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function destroy(User $user, $id)
    {
        $user = User::find($id);
        $user->delete();

        return view('auth.users', [
            'users' => User::all(),
            'info' => trans('users.deleted'),
            'onlineUsers' => UserHelper::onlineUsers()
        ]);
    }
}
