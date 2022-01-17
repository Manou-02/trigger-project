<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Retrait extends Model
{
    use HasFactory;

    protected $fillable= ['numCheque', 'client_id', 'montantRet', 'user_id'];

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
