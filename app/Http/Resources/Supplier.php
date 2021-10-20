<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Supplier extends JsonResource
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
            'address' => $this->address,
            'nrc' => $this->nrc,
            'nit' => $this->nit,
            'company_type' => $this->company_type,
            'business' => $this->business,
            'telephone' => $this->telephone,
            'active' => $this->active == 0 ? false : true,
            'created' => $this->created_at->diffForHumans(),
            'updated' => $this->updated_at->diffForHumans(),
            'created_at' => $this->created_at->format('d-m-y'),
            'updated_at' => $this->updated_at->format('d-m-y'),
        ];
    }
}
