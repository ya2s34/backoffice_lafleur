<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    public function articles()
    {
        return $this->belongsToMany(Article::class, ' lf_evenement_a_lf_article', 'lf_id_article', 'lf_id_evenement');
    }
    use HasFactory;
    protected $table = "lf_evenement";
    protected $primaryKey = "id_evenement";
    protected $fillable = array('event');
    public $timestamps = false;
}
