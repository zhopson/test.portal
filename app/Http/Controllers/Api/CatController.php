<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers\Api;

use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CatResource;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Artisan;

class CatController extends Controller
{
    public function index($id)
    {
        return CatResource::collection(Categorie::where('parent_id', $id)->get());
    }

    public function getCatTree($id)
    {
        $cats = DB::select("
            select t.id, t.name, t.parent_id from
            (
            WITH RECURSIVE sub_category(id, name, parent_id, level) AS (
                    SELECT id, name, parent_id, 1 FROM categories WHERE id=? /* код узла */
                    UNION ALL
                    SELECT c.id, c.name, c.parent_id, level+1
                    FROM categories c, sub_category sc
                    WHERE c.id = sc.parent_id
            )
            SELECT id, name, parent_id, (SELECT max(level) FROM sub_category) - level AS distance FROM sub_category order by distance
            ) t
        ", [$id]);
        return CatResource::collection($cats);
    }
   public function store(Request $request)
   {
       $data = $request->validate([
           'name' => 'required',
           'parent_id' => 'numeric|required',
       ]);

       return new CatResource(Categorie::create([
           'name' => $data['name'],
           'parent_id' => $data['parent_id'],
       ]));
   }
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
