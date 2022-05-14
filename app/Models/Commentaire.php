<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Client;

class Commentaire extends Model
{
    use HasFactory;
    public function client()
    {
        return $this->belongsTo(Client::class)->withDefault(function ($client, $commentaire) {
            $client->email = 'email_client';
        });
    }

    public function produit()
    {
        return $this->belongsTo(Product::class);
    }
}
