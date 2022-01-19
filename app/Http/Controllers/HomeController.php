<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role == 'admin')
            return redirect()->route('admin');
        else if(Auth::user()->role == 'gerant')
            return redirect()->route('gerant');
        else if(Auth::user()->role == 'client')
            return redirect()->route('client');
        else if(Auth::user()->role == 'clientprivilege')
            return redirect()->route('clientprivilege');
        else if(Auth::user()->role == "comptable")
            return redirect()->route('comptable');
        else if(Auth::user()->role == "douanier")
            return redirect()->route('douanier');
        else if(Auth::user()->role == "magasinier")
            return redirect()->route('magasinier');
        else if(Auth::user()->role == "secretaire")
            return redirect()->route('secretaire');
        else if(Auth::user()->role == "transitaire")
            return redirect()->route('transitaire');
        else
            return view('home');
    }

    //-- profile --//
    public function profileP(Request $req)
    {
        $validation = Validator::make($req->all(), [
            'name' => ['required', 'string', 'max:255'],
            'password' => ['nullable', 'confirmed'],
        ]);
        if($validation->passes()) {
            if($req->password != "") {
                User::where('id', '=', Auth::user()->id)->update([
                    'name' => $req->name,
                    'password' => Hash::make($req->password),
                ]);
            } else {
                User::where('id', '=', Auth::user()->id)->update([
                    'name' => $req->name,
                ]);
            }
            return redirect()->back()->with('success', 'Le profile a été modifié avec succès');
        } else {
            return redirect()->back()->withErrors($validation);
            //return redirect()->back()->with('errorForm', $validation->errors()->getMessages())->withInput();
        }
    }

}
