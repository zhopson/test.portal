<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Announce;
use App\Models\Dop_par;

class Categorie extends Model
{
    use HasFactory;
    protected $table = 'categories';

    public $fillable = [
        'name',
        'parent_id',
    ];
    public function children()
    {
        return $this->hasMany(Categorie::class,'parent_id')->with('children');
    }
    // public function childrenCategories()
    // {
    //     return $this->hasMany(Categorie::class,'parent_id')->with('childCategories');
    // }
        /**
     * get all Main categories with children.
     *
     * @return mixed
     */
    public static function allMainCategoriesWithChildren()
    {
        return self::where('parent_id',9999)->with('children')->get();
    }
    public function announces()
    {
        return $this->hasMany(Announce::class);
    }
    public function dop_pars()
    {
        return $this->hasMany(Dop_par::class);
    }

}
