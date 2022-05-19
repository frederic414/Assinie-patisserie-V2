<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Client;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $data = Client::select('id', 'created_at')->get()->groupBy(function($data){
            return Carbon::parse($data->created_at)->format('H');  
         });
         $hours = [];
         $hourCount = [];
         foreach($data as $hour => $values){
             $hours[] = $hour;
             $hourCount[] = count($values);
         }
        $client = Client::All();
        $nombre_clients = count($client);
        return view('admin.dashboard')
            ->with('nb_client', $nombre_clients)
            ->with('data', $data)
            ->with('hours', $hours)
            ->with('hourCount', $hourCount);
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

}
