<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Dop_par_valueResource extends JsonResource
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
            'dop_par_id' => $this->dop_par_id,
            'int_value' => $this->int_value,
            'str_value' => $this->str_value,
            'bool_value' => $this->bool_value,
          ];
    }
}
