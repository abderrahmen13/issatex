<?php

namespace App\Http\Controllers\Models;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(Auth::user()->role.'.employes.index', ['employes' => User::where('role','!=','admin')->where('role','!=','gerant')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(Auth::user()->role.'.employes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        if($validation->passes())
        {
            $request['password'] = Hash::make($request['password']);
            User::create($request->all());
            return back()->with('success', 'Employe created!');
        }
        else
        {
            return redirect()->back()->with('errorForm', $validation->errors()->getMessages())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view(Auth::user()->role.'.employes.show', ['employe' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view(Auth::user()->role.'.employes.edit', ['employe' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validation = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
        ]);
        if($validation->passes())
        {
            $user->update($request->all());
            return back()->with('success', 'Employe updated!');
        }
        else
        {
            return redirect()->back()->with('errorForm', $validation->errors()->getMessages())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'Employe deleted!');
    }
}
