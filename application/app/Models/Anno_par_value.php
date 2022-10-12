<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Dop_par;
use App\Models\Dop_par_value;
use App\Models\Announce;

class Anno_par_value extends Model
{
    use HasFactory;

    public function dop_par()
    {
        return $this->belongsTo(Dop_par::class);
    }
    public function dop_par_value()
    {
        return $this->belongsTo(Dop_par_value::class);
    }
    public function announce()
    {
        return $this->belongsTo(Announce::class);
    }
}
