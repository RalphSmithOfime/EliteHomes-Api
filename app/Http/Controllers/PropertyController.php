<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyRequest;
use App\Http\Resources\PropertyCollection;
use App\Http\Resources\PropertyResource;
use App\Models\Property;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PropertyController extends Controller
{
    //

    public function index()
    {
        return PropertyCollection::collection(Property::paginate(5));
    }

    public function store(PropertyRequest $request)
    {
        $property = new Property;
        $property->property_name = $request->property_name;
        $property->property_address = $request->property_address;
        $property->property_price = $request->property_price;
        $property->property_stock = $request->property_stock;
        $property->property_category = $request->property_category;
        $property->property_description = $request->property_description;
        $property->property_total_floor_area = $request->property_total_floor_area;
        $property->property_bedroom_number = $request-> property_bedroom_number;
        $property->property_toilet_number= $request->property_toilet_number;

        return response([
            'data'=> new PropertyResource($property)
        ], Response::HTTP_CREATED);
    }

    public function show(Property $id)
    {

    }

    public function update(Request $request, Property $property)
    {
        $property->update($request->all());

        return response([
            'data' => new PropertyResource($property)
        ], Response::HTTP_CREATED);
    }

    public function destroy(Property $property)
    {
        $property->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
