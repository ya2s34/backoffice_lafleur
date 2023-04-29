<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $table = "lf_commande_client";
    protected $primaryKey = "id_commande_client";
    protected $fillable = array('date_commande','date_livraison','status_livraison', 'lf_id_prix_livraison', 'lf_id_lotterie', 'lf_id_client');
    public $timestamps = false;
}
