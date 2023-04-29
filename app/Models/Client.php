<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table = "lf_client";
    protected $primaryKey = "id_client";
    protected $fillable = array('nom','mail','telephone','mot_de_passe','cree_a');
    public $timestamps = false;
}
