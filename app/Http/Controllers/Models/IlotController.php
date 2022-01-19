<?php

namespace App\Http\Controllers\Models;

use App\Http\Controllers\Controller;
use App\Ilot;
use Illuminate\Http\Request;
use Auth;

class IlotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(Auth::user()->role.'.ilots.index', ['ilots' => Ilot::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(Auth::user()->role.'.ilots.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Ilot::create($request->all());
        return back()->with('success', 'Ilot created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ilot  $ilot
     * @return \Illuminate\Http\Response
     */
    public function show(Ilot $ilot)
    {
        return view(Auth::user()->role.'.ilots.show', ['ilot' => $ilot]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ilot  $ilot
     * @return \Illuminate\Http\Response
     */
    public function edit(Ilot $ilot)
    {
        return view(Auth::user()->role.'.ilots.edit', ['ilot' => $ilot]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ilot  $ilot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ilot $ilot)
    {
        $ilot->update($request->all());
        return back()->with('success', 'Ilot updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ilot  $ilot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ilot $ilot)
    {
        $ilot->delete();
        return back()->with('success', 'Ilot deleted!');
    }
}
