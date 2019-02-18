<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Passer extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'examinee' => $this->examinee,
            'eligibility' => $this->eligibility,
            'school' => $this->school,
            'division' => $this->division
        ];
    }
}
