<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function evenements()
    {
        return $this->belongsToMany(Evenement::class, 'lf_evenement_a_lf_article', 'lf_id_article', 'lf_id_evenement');
    }
    use HasFactory;
    protected $table = "lf_article";
    protected $primaryKey = "id_article";
    protected $fillable = array('nom_article','prix','quantite_stock','date_inventaire','poid','taille','id_unite','id_couleur','image','description','id_categorie');
    public $timestamps = false;
}
