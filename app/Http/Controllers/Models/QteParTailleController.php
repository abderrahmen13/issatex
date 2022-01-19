<?php

namespace App\Http\Controllers\Models;

use App\Http\Controllers\Controller;
use App\QteParTaille;
use Illuminate\Http\Request;
use Auth;
use App\OrderFabrication;
use App\Taille;
use DB;

class QteParTailleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $of = $_GET['of'];
        return view(Auth::user()->role.'.qtepartaille.create', [
            'orderFabrication' => OrderFabrication::where('id', $of)->first(),
            'tailles' => Taille::all()
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
        if(QteParTaille::where('ofId',$request->ofId)->where('tailleId',$request->tailleId)->count() > 0) {
            $qteParTaille = QteParTaille::where('ofId',$request->ofId)->where('tailleId',$request->tailleId)->first();
            $request->qte = $request->qte + $qteParTaille->qte;
            $qteParTaille->update($request->all());
        } else {
            QteParTaille::create($request->all());
        }
        return back()->with('success', 'Taille dordre de fabrication crée!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\QteParTaille  $qteParTaille
     * @return \Illuminate\Http\Response
     */
    public function show(QteParTaille $qteParTaille)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrderFabrication  $orderFabrication
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderFabrication $orderFabrication)
    {
        $of = $_GET['of'];
        return view(Auth::user()->role.'.qtepartaille.edit', [
            'ordreFabrication' => $orderFabrication,
            'qteParTailles' => QteParTaille::where('ofId',$of)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\QteParTaille  $qteParTaille
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QteParTaille $qteParTaille)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\QteParTaille  $qteParTaille
     * @return \Illuminate\Http\Response
     */
    public function destroy(QteParTaille $qteParTaille)
    {
        $qtepartaille = $_GET['qtepartaille'];
        QteParTaille::where('id',$qtepartaille)->delete();
        return back()->with('success', 'Quantité dordre de fabrication deleted!');
    }
}
