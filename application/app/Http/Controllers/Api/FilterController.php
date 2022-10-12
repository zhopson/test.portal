<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\Api;

//use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Dop_parResource;
use App\Http\Resources\ParTypeResource;
//use App\Http\Resources\DopParValueResource;
use App\Models\Dop_par;
use App\Models\Dop_par_value;
use App\Models\Par_type;
//use App\Models\Dop_par;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Artisan;

class FilterController extends Controller
{
    public function GetFilterParams($cat_id)
    {
        // return FilterResource::collection(Categorie::find($cat_id)->dop_pars);
        return Dop_parResource::collection(Dop_par::where('categorie_id', $cat_id)->get());
    }
    public function GetFilterParamType()
    {
        return ParTypeResource::collection(Par_type::all());
        //return response()->json(Par_type::all());
    }

    public function SaveCatParam(Request $request)
    {
        $data = $request->validate([
            'newDopPar.name' => 'required',
            'newDopPar.type' => 'required',
//            'newDopParValues' => 'array:int_value,str_value,bool_value',
            'newDopParValues' => 'required',
            'newCatId' => 'numeric|required',
        ]);
        //$name = $request->input('name');
        //$data = $request->input();
        // $dop_par = new FilterResource(Dop_par::create([
        //     'name' => $data['newDopPar.name'],
        //     'type' => $data['newDopPar.type'],
        //     'categorie_id' => $data['currentParentId'],
        // ]));
        //var_dump($data);
        $dop_par = Dop_par::create([
            'name' => $data['newDopPar']['name'],
            'par_type_id' => $data['newDopPar']['type'],
            'categorie_id' => $data['newCatId'],
        ]);

        foreach ($data['newDopParValues'] as $value) {
            Dop_par_value::create([
                'dop_par_id' => $dop_par->id,
                'int_value' => $value['int_value'],
                'str_value' => $value['str_value'],
                'bool_value' => $value['bool_value'],
            ]);
        }

        // $dop_par_values = new DopParValueResource(Dop_par_value::create([
            // 'dop_par_id' => $this->dop_par_id,
            // 'int_value' => $this->int_value,
            // 'str_value' => $this->str_value,
            // 'bool_value' => $this->bool_value,

        // ]));

        // 'dop_par_values' => $data['newParamValues'],

        //$dop_par_values = $dop_par->dop_par_values()->save(dop_par_values);

        // $new_cat = Category::create(compact('name'));

        // $response = [
        //     'success' => $success,
        //     'message' => $message,
        // ];
        // return response($response, 200);
    }

//     public function all()
//     {
//         //$cat_tree  = Categorie::with('children')->orderBy('id')->get();
//         //$cat_tree = Categorie::with('children:id,name,parent_id')->orderBy('id')->get('id', 'name', 'parent_id');
//         //return response()->json($cat_tree);
//         return response()->json(Categorie::allMainCategoriesWithChildren());
//     }

//     public function getCatTree($id)
//     {
//         $cats = DB::select("
//             select t.id, t.name, t.parent_id from
//             (
//             WITH RECURSIVE sub_category(id, name, parent_id, level) AS (
//                     SELECT id, name, parent_id, 1 FROM categories WHERE id=? /* код узла */
//                     UNION ALL
//                     SELECT c.id, c.name, c.parent_id, level+1
//                     FROM categories c, sub_category sc
//                     WHERE c.id = sc.parent_id
//             )
//             SELECT id, name, parent_id, (SELECT max(level) FROM sub_category) - level AS distance FROM sub_category order by distance
//             ) t
//         ", [$id]);
//         return CatResource::collection($cats);
//     }

//    public function store(Request $request)
//    {
//        $data = $request->validate([
//            'name' => 'required',
//            'parent_id' => 'numeric|required',
//        ]);

//        return new CatResource(Categorie::create([
//            'name' => $data['name'],
//            'parent_id' => $data['parent_id'],
//        ]));
//    }

//    public function show(User $user)
//    {
//        return new UserResource($user);
//    }
//    public function update(User $user, Request $request)
//    {
//        $data = $request->validate([
//            'name' => 'required',
//            'email' => 'required|email',
//        ]);
//
//        $user->update($data);
//
//        return new UserResource($user);
//    }
//    public function destroy(User $user)
//    {
//        $user->delete();
//
//        return response(null, 204);
//    }
//    public function fill_db()
//    {
//        Artisan::call('migrate --seed');
////        return $this->sendResponse("", 'Database cleared and filled faker data.');
//        return response(null, 204);
//    }

}
