<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; 
use Validator;
use App\Ilot;
use App\Article;
use App\Coli;
use App\User;
use App\Facture;
use App\FactureOF;
use App\Machine;
use App\OF;
use App\Palette;
use App\Taille;
use App\Setting;
use Auth;
use Hash;
use Mail;

class AdminController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('authAdmin');
    }

    //-- profile --//
    public function profileP(Request $req)
    {
        if($req->password != "") {
            User::where('id', '=', Auth::user()->id)->update([
                'name' => $req->name,
                'email' => $req->email,
                'password' => bcrypt($req->password),
                'phone' => $req->phone,
                'address' => $req->address,
                'country' => $req->country,
            ]);
        } else {
            User::where('id', '=', Auth::user()->id)->update([
                'name' => $req->name,
                'email' => $req->email,
                'phone' => $req->phone,
                'address' => $req->address,
                'country' => $req->country,
            ]);
        }
        return redirect()->back()->with('success', 'Le profile a été modifié avec succès');
    }

    //-- jobs --//
    public function addJobP(Request $req)
    {
        $url = rand(111111,999999);
        $existe = Job::where('url', '=', $url)->count();
        while ($existe > 0) {
           $url = rand(111111,999999);
        }
        $Job = new Job;
        $Job->name_fr = $req->name_fr;
        $Job->name_en = $req->name_en;
        $Job->describe_fr = $req->describe_fr;
        $Job->describe_en = $req->describe_en;
        $Job->timer_fr = $req->timer_fr;
        $Job->timer_en = $req->timer_en;
        $Job->country = $req->country;
        $Job->url = $url;
        $Job->description_fr = $req->description_fr;
        $Job->description_en = $req->description_en;
        $Job->objective_fr = $req->objective_fr;
        $Job->objective_en = $req->objective_en;
        $Job->available = $req->available;
        $Job->save();
        return redirect()->back()->with('success', 'L’emploi a été ajouté avec succès.');
    }
    public function viewJob(Request $req, $id)
    {
        $job = Job::where('id', '=', $id)->first();
        return view('admin.jobs.viewJob',['job' => $job]);
    }
    public function editJob(Request $req, $id)
    {
        $job = Job::where('id', '=', $id)->first();
        return view('admin.jobs.editJob',['job' => $job]);
    }
    public function editJobP(Request $req, $id)
    {
        Job::where('id', '=', $id)->update([
            'name_fr' => $req->name_fr,
            'name_en' => $req->name_en,
            'describe_fr' => $req->describe_fr,
            'describe_en' => $req->describe_en,
            'timer_fr' => $req->timer_fr,
            'timer_en' => $req->timer_en,
            'country' => $req->country,
            //'url' => $url,
            'description_fr' => $req->description_fr,
            'description_en' => $req->description_en,
            'objective_fr' => $req->objective_fr,
            'objective_en' => $req->objective_en,
            'available' => $req->available,
        ]);
        return redirect()->back()->with('success', 'L’emploi a été modifié avec succès.');
    }
    public function deleteJobP(Request $req, $id)
    {
        Job::where('id', '=', $id)->delete();
        return redirect()->back()->with('success', 'L’emploi a été supprimé avec succès.');
    }
    
    //-- jobs requests --//
    public function viewJobRequests(Request $req, $id)
    {
        $reservation = Reservation::where('id', '=', $id)->first();
        return view('admin.jobs.viewJobRequests',['reservation' => $reservation]);
    }
    public function deleteJobRequestsP(Request $req, $id)
    {
        Reservation::where('id', '=', $id)->delete();
        return redirect()->back()->with('success', 'le candidat a été supprimé avec succès.');
    }
    public function replayJobP(Request $req, $id)
    {
        Reservation::where('id', '=', $id)->update([
            'accepted' => $req->accepted,
            'replay' => $req->replay,
        ]);
        $text2 = $req->replay;
        $name_ar = Reservation::where('id', '=', $id)->value('firstname');
        $email = Reservation::where('id', '=', $id)->value('email');
        $yourmessage = Reservation::where('id', '=', $id)->value('message');
        $subject = "Une réponse au candidature";
        $title = "Salut, vous avez un message à partir de ".url('/');
        Mail::send( ['html' => 'layouts.newinvoice'], ['text2' => $text2, 'subject' => $subject, 'title' => $title, 'yourmessage' => $yourmessage], function($message) use ($email,$subject)
        {
            $message->subject($subject);
            $message->from('info@wg-consulting.fr', 'WG Consulting - Demande d’emploi');
            $message->to($email);
        });
        return redirect()->back()->with('success', 'Votre réponse a été envoyée avec succès.');
    }

    //-- galerie --//
    public function filePost(Request $req)
    {
        $file = $req->file('file');
        $new_name = rand() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('userfiles/images'), $new_name);
        $Galerie = new Galerie;
        $Galerie->name = $new_name;
        $Galerie->src = "public/userfiles/images/".$new_name;
        $Galerie->save();
        return response()->json([
            'message2'   => 'Galerie a été téléchargé avec succès',
            'class_name'  => 'alert-success',
            'id' => $Galerie->id,
            'name' => $new_name,
            'src' => "public/userfiles/images/".$new_name
        ]);
    }
    public function fileDelete(Request $req, $id)
    {
        Galerie::where('id', '=', $id)->delete();
        return response()->json([
            'message2'   => 'Galerie a été effacé avec succès',
            'class_name'  => 'alert-success'
        ]);
    }

    //-- subscriber --//
    public function deleteSubscriberP(Request $req, $id)
    {
        Subscriber::where('id', '=', $id)->delete();
        return redirect()->back()->with('success', 'l’abonné a été supprimé avec succès.');
    }

    //-- references --//
    public function addReferencesP(Request $req)
    {
        $validation = Validator::make($req->all(), [
            'file' => 'required|mimes:png,jpg,jpeg,gif|max:2048'
        ]);
        if($validation->passes())
        {
            $file = $req->file('file');
            $new_name = $req->name . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('references'), $new_name);
            $Partner = new Partner;
            $Partner->name = $req->name;
            $Partner->url = $req->url;
            $Partner->logo = "public/references/".$new_name;
            $Partner->phone = $req->phone;
            $Partner->email = $req->email;
            $Partner->available = $req->available;
            $Partner->save();
            return redirect()->back()->with('success', 'le reference a été ajouté avec succès.');
        }
        else
        {
            return redirect()->back()->withErrors($validation);
        }
    }
    public function editReferences(Request $req, $id)
    {
        $references = Partner::where('id', '=', $id)->first();
        return view('admin.references.editReferences',['references' => $references]);
    }
    public function editReferencesP(Request $req, $id)
    {
        $validation = Validator::make($req->all(), [
            'file' => 'mimes:png,jpg,jpeg,gif|max:2048'
        ]);
        if($validation->passes())
        {
            if ($req->hasFile('file'))
            {
                $file = $req->file('file');
                $new_name = $req->name . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('references'), $new_name);
                Partner::where('id', '=', $id)->update([
                    'name' => $req->name,
                    'url' => $req->url,
                    'logo' => "public/references/".$new_name,
                    'phone' => $req->phone,
                    'email' => $req->email,
                    'available' => $req->available,
                ]);
            }
            else {
                Partner::where('id', '=', $id)->update([
                    'name' => $req->name,
                    'url' => $req->url,
                    'phone' => $req->phone,
                    'email' => $req->email,
                    'available' => $req->available,
                ]);
            }
            return redirect()->route('references')->with('success', 'le reference a été modifié avec succès.');
        }
        else
        {
            return redirect()->back()->withErrors($validation);
        }
    }
    public function deletereferencesP(Request $req, $id)
    {
        Partner::where('id', '=', $id)->delete();
        return redirect()->back()->with('success', 'le reference a été supprimé avec succès.');
    }

    //-- team --//
    public function addTeamP(Request $req)
    {
        $validation = Validator::make($req->all(), [
            'email' => 'required|unique:team|max:100',
            'password' => 'required',
            'name' => 'required',
            'function' => 'required'
        ]);
        if($validation->passes())
        {
            $Team = new Team;
            $Team->name = $req->name;
            $Team->email = $req->email;
            $Team->password = bcrypt($req->password);
            $Team->phone = $req->phone;
            $Team->function = $req->function;
            $Team->available = $req->available;
            $Team->save();
            return redirect()->back()->with('success', 'le membre a été ajouté avec succès.');
        }
        else
        {
            return redirect()->back()->withErrors($validation);
        }
    }
    public function editTeam(Request $req, $id)
    {
        $team = User::where('id', '=', $id)->first();
        return view('admin.team.editTeam',['team' => $team]);
    }
    public function editTeamP(Request $req, $id)
    {
        $validation = Validator::make($req->all(), [
            'name' => 'required',
            'function' => 'required'
        ]);
        if($validation->passes())
        {
            User::where('id', '=', $id)->where('role', '=', 'team')->update([
                'name' => $req->name,
                'function' => $req->function,
                'available' => $req->available
            ]);
            return redirect()->route('team')->with('success', 'le membre a été modifié avec succès.');
        }
        else
        {
            return redirect()->back()->withErrors($validation);
        }
    }
    public function deleteTeamP(Request $req, $id)
    {
        User::where('id', '=', $id)->where('role', '=', 'team')->delete();
        return redirect()->back()->with('success', 'le membre a été supprimé avec succès.');
    }

    //-- settings --//
    public function editSettingsP(Request $req)
    {
        $validation = Validator::make($req->all(), [
            'name_fr' => 'required',
            'logo1' => 'nullable|image|max:2048',
            'description_en' => 'required',
            'description_fr' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'address2' => 'required',
            'date' => 'required',
            'date2' => 'required',
            'phone' => 'required',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
            'google' => 'nullable|url',
            'linkedin' => 'required|url',
        ]);
        if($validation->passes())
        {
            if ($req->hasFile('logo1'))
            {
                $file = $req->file('logo1');
                $new_name = $req->name_fr . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('settings'), $new_name);
                Setting::where('id', '=', 1)->update([
                    'name_fr' => $req->name_fr,
                    'logo1' => "public/settings/".$new_name,
                    'description_en' => $req->description_en,
                    'description_fr' => $req->description_fr,
                    'email' => $req->email,
                    'address' => $req->address,
                    'address2' => $req->address2,
                    'address_tn' => $req->address_tn,
                    'address_tn2' => $req->address_tn2,
                    'phone_tn' => $req->phone_tn,
                    'phone_tn2' => $req->phone_tn2,
                    'date' => $req->date,
                    'date2' => $req->date2,
                    'phone2' => $req->phone2,
                    'phone' => $req->phone,
                    'facebook' => $req->facebook,
                    'twitter' => $req->twitter,
                    'instagram' => $req->instagram,
                    'google' => $req->google,
                    'linkedin' => $req->linkedin,
                ]);
            }
            else {
                Setting::where('id', '=', 1)->update([
                    'name_fr' => $req->name_fr,
                    'description_en' => $req->description_en,
                    'description_fr' => $req->description_fr,
                    'email' => $req->email,
                    'address' => $req->address,
                    'address2' => $req->address2,
                    'address_tn' => $req->address_tn,
                    'address_tn2' => $req->address_tn2,
                    'phone_tn' => $req->phone_tn,
                    'phone_tn2' => $req->phone_tn2,
                    'date' => $req->date,
                    'date2' => $req->date2,
                    'phone2' => $req->phone2,
                    'phone' => $req->phone,
                    'facebook' => $req->facebook,
                    'twitter' => $req->twitter,
                    'instagram' => $req->instagram,
                    'google' => $req->google,
                    'linkedin' => $req->linkedin,
                ]);
            }
            return redirect()->back()->with('success', 'Les parametres a été modifié avec succès.');
        }
        else
        {
            return redirect()->back()->withErrors($validation);
        }
    }

    //-- contacts --//
    public function viewContacts(Request $req, $id)
    {
        $contact = Contact::where('id', '=', $id)->first();
        return view('admin.contacts.viewContacts',['contact' => $contact]);
    }
    public function deleteContactsP(Request $req, $id)
    {
        Contact::where('id', '=', $id)->delete();
        return redirect()->back()->with('success', 'le message a été supprimé avec succès.');
    }
    public function replayContactsP(Request $req, $id)
    {
        Contact::where('id', '=', $id)->update([
            'replay' => $req->replay,
        ]);
        $text2 = $req->replay;
        $name_ar = Contact::where('id', '=', $id)->value('firstname');
        $email = Contact::where('id', '=', $id)->value('email');
        $yourmessage = Contact::where('id', '=', $id)->value('message');
        $subject = "Une réponse au message";
        $title = "Salut, vous avez un message à partir de ".url('/');
        Mail::send( ['html' => 'layouts.newinvoice'], ['text2' => $text2, 'subject' => $subject, 'title' => $title, 'yourmessage' => $yourmessage], function($message) use ($email,$subject)
        {
            $message->subject($subject);
            $message->from('info@wg-consulting.fr', 'WG Consulting - Une réponse au message');
            $message->to($email);
        });
        return redirect()->back()->with('success', 'Votre réponse a été envoyée avec succès.');
    }

    //-- pages --//
    public function viewPage(Request $req, $name)
    {
        $page = Page::where('name', '=', $name)->first();
        return view('admin.pages.viewPage',['page' => $page]);
    }
    public function editPagesP(Request $req, $id)
    {
        $validation = Validator::make($req->all(), [
            'context_fr' => 'required',
            'context_en' => 'required',
        ]);
        if($validation->passes())
        {
            Page::where('id', '=', $id)->update([
                'context_fr' => $req->context_fr,
                'context_en' => $req->context_en
            ]);
            return redirect()->back()->with('success', 'la page a été modifié avec succès.');
        }
        else
        {
            return redirect()->back()->withErrors($validation);
        }
    }
    

}