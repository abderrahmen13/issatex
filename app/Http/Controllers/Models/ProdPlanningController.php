<?php

namespace App\Http\Controllers\Models;

use App\Http\Controllers\Controller;
use App\ProdPlanning;
use App\Ilot;
use App\OrderFabrication;
use Illuminate\Http\Request;
use Auth;

class ProdPlanningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view(Auth::user()->role.'.planProduction.index', ['planProduction' => ProdPlanning::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(Auth::user()->role.'.planProduction.create', [
            'ilots' => Ilot::all(),
            'orderFabrications' => OrderFabrication::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ProdPlanning::create($request->all());
        return back()->with('success', 'Plan de production created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProdPlanning  $prodPlanning
     * @return \Illuminate\Http\Response
     */
    public function show(ProdPlanning $prodPlanning)
    {
        return view(Auth::user()->role.'.planProduction.show', ['planProduction' => $prodPlanning]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProdPlanning  $prodPlanning
     * @return \Illuminate\Http\Response
     */
    public function edit(ProdPlanning $prodPlanning)
    {
        return view(Auth::user()->role.'.planProduction.edit', [
            'planProduction' => $prodPlanning,
            'ilots' => Ilot::all(),
            'orderFabrications' => OrderFabrication::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProdPlanning  $prodPlanning
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProdPlanning $prodPlanning)
    {
        $prodPlanning->update($request->all());
        return back()->with('success', 'Plan de production updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProdPlanning  $prodPlanning
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProdPlanning $prodPlanning)
    {
        $prodPlanning->delete();
        return back()->with('success', 'Plan de production deleted!');
    }
}
