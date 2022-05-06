<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function commande()
    {
        $commandes = Commande::all();

        $commandes->transform(function($commande, $key){
            $commande->panier = unserialize($commande->panier);
            return $commande;
        });
        return view('admin.commande')->with('commandes', $commandes);
    }

    public function commande_traiter($id)
    {
        $commande = Commande::find($id);

        $commande->statut_commande = 1;
        $commande->update();

        return redirect('/admin/commandes');
    }

    public function commande_non_traiter($id)
    {
        $commande = Commande::find($id);

        $commande->statut_commande = 0;
        $commande->update();

        return redirect('/admin/commandes');
    }
    
    public function acceder_compte(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);


        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
       
        $email = $request->validate([
            'email' => ['required', 'email']
        ]);
        $password = $credentials['password'];

        $client = Client::where('email', $input['email'])->first();
       // $email = $input['email'];
       // $password = Hash::make($input['password']);
        $role = $client->role;
        // $data = Client::select('id', 'created_at')->get()->groupBy(function($data){
        //     return Carbon::parse($data->created_at)->format('H');  
        //  });
        //  $hours = [];
        //  $hourCount = [];
        //  foreach($data as $hour => $values){
        //      $hours[] = $hour;
        //      $hourCount[] = count($values);
        //  }
        // $clients = Client::All();
        // $commandes = Commande::All();
        // $commande_traite[]= Commande::where('status_commande',"1");
        // $commande_non_traite[] = Commande::where('status_commade',"0");
        // $nb_com_traite = count($commande_traite);
        // $nb_com_non_traite = count($commande_non_traite);
        // $nombre_clients = count($clients);
        // $nombre_commandes = count($commandes);

        if (Auth::guard('user')->attempt($credentials) && $client->is_admin === 1 ) {
            if (! Hash::check($request->password, $client->password)) {
                return back()->withErrors([
                    'password' => ['The provided password does not match our records.']
                ]);
            }
            Session::put('client', $client);
            $request->session()->passwordConfirmed();
            return view('admin.dashboard');

                // ->with('nb_client', $nombre_clients)
                // ->with('nb_commande', $nombre_commandes)
                // ->with('nb_com_traite', $nb_com_traite)
                // ->with('nb_com_non_traite', $nb_com_non_traite)
                // ->with('data', $data)
                // ->with('hours', $hours)
                // ->with('hourCount', $hourCount);

        }
        else if (Auth::guard('user')->attempt($credentials) && $client->is_admin === 0 ) {
            if (! Hash::check($request->password, $client->password)) {
                return back()->withErrors([
                    'password' => ['The provided password does not match our records.']
                ]);
            }
            $request->session()->passwordConfirmed();
            Session::put('client', $client);
            return redirect('/catalogue')->with('status', 'Vous etes bien connecté!');
        }
        else {
            return back()->with('status', "Ce compte n'existe pas, veuillez creer un compte SVP!!!");
        }
    }



}
