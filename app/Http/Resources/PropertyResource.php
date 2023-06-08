<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //return parent::toArray($request);

        return[
            'property_name'=>$this->property_name,
            'property_address'=>$this->property_address,
            'property_price'=>$this->property_price,
            'property_stock'=>$this->property_stock == 0 ? 'Property Unavailable' : $this->property_stock,
            'property_category'=>$this->property_category,
            'property_description'=>$this->property_description,
            'property_total_floor_area'=>$this->property_total_floor_area,
            'property_bedroom_number'=>$this->property_bedroom_number,
            'property_toilet_number'=>$this->property_toilet_number,
            'href' =>[
                'categories'=>route('categories.index', $this->id)
            ]


        ];
    }
}
