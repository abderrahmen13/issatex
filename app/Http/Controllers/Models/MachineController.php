<?php

namespace App\Http\Controllers\Models;

use App\Http\Controllers\Controller;
use App\Machine;
use App\Ilot;
use Illuminate\Http\Request;
use Auth;

class MachineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(Auth::user()->role.'.machines.index', [
            'machines' => Machine::all(),
            'ilots' => Ilot::where('available', 1)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(Auth::user()->role.'.machines.create', ['ilots' => Ilot::where('available', 1)->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Machine::create($request->all());
        return back()->with('success', 'Machine created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function show(Machine $machine)
    {
        return view(Auth::user()->role.'.machines.show', ['machine' => $machine]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function edit(Machine $machine)
    {
        return view(Auth::user()->role.'.machines.edit', ['machine' => $machine, 'ilots' => Ilot::where('available', 1)->get()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Machine $machine)
    {
        $machine->update($request->all());
        return back()->with('success', 'Machine updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Machine  $machine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Machine $machine)
    {
        $machine->delete();
        return back()->with('success', 'Machine deleted!');
    }
}
