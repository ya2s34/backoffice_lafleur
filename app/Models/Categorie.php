<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    protected $table = "lf_categorie";
    protected $primaryKey = "id_categorie";
    protected $fillable = array('nom_categorie');
    public $timestamps = false;

    // Ajoutez cette méthode pour définir la relation entre les catégories et les articles
    public function articles()
    {
        return $this->hasMany(Article::class, 'id_categorie');
    }
}
