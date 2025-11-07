<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyRequest;
use App\Models\Property;
use Illuminate\Auth\Events\Validated;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = auth('api')->user()->properties()->get();
        return response()->json($properties);
    }

    public function store(PropertyRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth('api')->id();
        $property = Property::create($data);

        return response()->json([
            'message' => 'Criado com sucesso',
            'property' => $property
        ], 201);
    }

    public function show(Property $property)
    {
        if ($property['user_id'] !== auth('api')->id()) {
            return response()->json(['error' => 'não autoriazado'], 403);
        }

        return response()->json($property);
    }

    public function update(PropertyRequest $request, Property $property)
    {
        if ($property['user_id'] !== auth('api')->id()) {
            return response()->json(['error' => 'não autoriazado'], 403);
        }
        $data = $request->validated();
        $property->update($data);

        return response()->json([
            'message' => 'Imóvel atualizado com sucesso',
            'property' => $property
        ], 200);
    }

    public function destroy(Property $property)
    {
        if ($property['user_id'] !== auth('api')->id()) {
            return response()->json(['error' => 'não autoriazado'], 403);
        }

        $property->delete();
        return response()->json([
            'message' => 'Propriedade deletada com sucesso',
            'property' => $property
        ], 202);
    }
}
