<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;

class Versement extends Model
{
    use HasFactory;

    protected $fillable = ['numCheque', 'client_id', 'montantVerse'];

    public function client(){
        return $this->belongsTo(Client::class);
    }
}
