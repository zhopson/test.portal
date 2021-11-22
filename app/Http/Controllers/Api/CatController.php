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
//use Illuminate\Support\Facades\Artisan;

class CatController extends Controller
{
    public function index($id)
    {
        return CatResource::collection(Categorie::where('parent_id', $id)->get());
    }
//    public function store(Request $request)
//    {
//        $data = $request->validate([
//            'name' => 'required',
//            'email' => 'required|unique:users',
//            'password' => 'required|min:8',
//        ]);
//
//        return new UserResource(User::create([
//            'name' => $data['name'],
//            'email' => $data['email'],
//            'password' => bcrypt($data['password']),
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