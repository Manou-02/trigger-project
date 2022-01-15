<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class AuditCompte extends Model
{
    use HasFactory;
    protected $fillable = ['typeAction', 'numCompte', 'nomClient', 'soldeAncien', 'soldeNouveau', 'user_id'];


    public function user(){
        return $this->belongsTo(User::class);
    }
}
