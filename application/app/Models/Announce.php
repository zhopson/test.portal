<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Categorie;
use App\Models\Anno_par_value;

class Announce extends Model
{
    use HasFactory;

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
    public function anno_par_values()
    {
        return $this->hasMany(Anno_par_value::class);
    }
}
