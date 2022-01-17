<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Client;
use App\Models\User;


class AuditVersement extends Model
{
    use HasFactory;

    protected $fillable = ['typeAction', 'numVerse', 'client_id', 'montantAncien', 'montantNouv', 'user_id'];

    public function client(){
        return $this->belongsTo(Client::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

}
