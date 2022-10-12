<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Categorie;
use App\Models\Anno_par_value;
use App\Models\Par_type;

class Dop_par extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'par_type_id',
        'categorie_id',
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
    public function anno_par_value()
    {
        return $this->hasOne(Anno_par_value::class);
    }
    public function dop_par_values()
    {
        return $this->hasMany(Dop_par_value::class);
    }
    public function par_type()
    {
        return $this->belongsTo(Par_type::class);
    }
}
