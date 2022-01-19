<?php

namespace App\Http\Controllers\Models;

use App\Http\Controllers\Controller;
use App\OrderFabrication;
use App\Ilot;
use App\Article;
use Illuminate\Http\Request;
use Auth;

class OrderFabricationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role == "client" || Auth::user()->role == "clientprivilege")
            return view(Auth::user()->role.'.ofs.index', ['ordreFabrications' => OrderFabrication::where('userId',Auth::user()->id)->get()]);
        else
            return view(Auth::user()->role.'.ofs.index', ['ordreFabrications' => OrderFabrication::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(Auth::user()->role.'.ofs.create', [
            'ilots' => Ilot::where('available', 1)->get(),
            'articles' => Article::where('available', 1)->get()
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
        OrderFabrication::create($request->all());
        return back()->with('success', 'Ordre de fabrication created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrderFabrication  $orderFabrication
     * @return \Illuminate\Http\Response
     */
    public function show(OrderFabrication $orderFabrication)
    {
        return view(Auth::user()->role.'.ofs.show', ['ordreFabrication' => $orderFabrication]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrderFabrication  $orderFabrication
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderFabrication $orderFabrication)
    {
        return view(Auth::user()->role.'.ofs.edit', [
            'ordreFabrication' => $orderFabrication,
            'ilots' => Ilot::where('available', 1)->get(),
            'articles' => Article::where('available', 1)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrderFabrication  $orderFabrication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderFabrication $orderFabrication)
    {
        $orderFabrication->update($request->all());
        return back()->with('success', 'Ordre de fabrication updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrderFabrication  $orderFabrication
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderFabrication $orderFabrication)
    {
        $orderFabrication->delete();
        return back()->with('success', 'Ordre de fabrication deleted!');
    }
}
