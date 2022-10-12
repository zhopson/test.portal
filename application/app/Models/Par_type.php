<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Dop_par;

class Par_type extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
    ];

    public function dop_pars()
    {
        return $this->hasMany(Dop_par::class);
    }
}
