<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Dop_par;
use App\Models\Anno_par_value;

class Dop_par_value extends Model
{
    use HasFactory;

    public $fillable = [
        'dop_par_id',
        'int_value',
        'str_value',
        'bool_value',
    ];
    public function dop_par()
    {
        return $this->belongsTo(Dop_par::class);
    }
    public function anno_par_value()
    {
        return $this->hasOne(Anno_par_value::class);
    }
}
