<?php

namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TenantRequest;
use App\Models\Tenant;


class TenantController extends Controller
{
    public function index()
    {
        //
    }

    public function store(TenantRequest $request) 
    {
        $validate = $request->validated();
        $data = Tenant::create($validate);

        return response()->json(['message' => 'Criado com sucesso', 'data' => $data], 201);
    }

    public function show(Tenant $tenant)
    {
        //
    }

    public function update(Request $request, Tenant $tenant)
    {
        //
    }

    public function destroy(Tenant $tenant)
    {
        $tenant->delete();
        return response()->json(['message' => 'Locatario deletado com sucesso','tenant' => $tenant],202);
    }
}
