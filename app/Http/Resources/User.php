<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
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
            'surname' => $this->surname,
            'email' => $this->email,
            'avatar' => $this->avatar,
            'isAdmin' => $this->isAdmin == 0 ? false : true,
            'active' => $this->active == 0 ? false : true,
            'created' => $this->created_at->diffForHumans(),
            'updated' => $this->updated_at->diffForHumans(),
            'created_at' => $this->created_at->format('d-m-y'),
            'updated_at' => $this->updated_at->format('d-m-y'),
        ];
    }
}
