<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Dop_par_valueResource;

class Dop_parResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'par_type_id' => $this->par_type_id,
            'dop_par_values' => Dop_par_valueResource::collection($this->dop_par_values),
            'categorie_id' => $this->categorie_id,
          ];
    }
}
