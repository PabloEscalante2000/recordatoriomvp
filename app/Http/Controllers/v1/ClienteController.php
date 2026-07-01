<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\v1\PatchCliente;
use App\Http\Requests\v1\StoreCliente;
use App\Http\Resources\v1\ClienteResource;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function getClientes(Request $request)
    {
        // Lógica para obtener los clientes
        return ClienteResource::collection(Cliente::all());
    }

    public function getCliente(Cliente $cliente)
    {
        // Lógica para obtener un cliente específico
        return new ClienteResource($cliente);
    }

    public function createCliente(StoreCliente $request)
    {
        $data = $request->validatedData();
        $cliente = Cliente::create($data);
        return new ClienteResource($cliente);
    }

    public function deleteCliente(Cliente $cliente)
    {
        $cliente->delete();
        return response()->json(null, 204);
    }

    public function patchCliente(PatchCliente $request, Cliente $cliente)
    {
        $data = $request->validatedData();
        $cliente->update($data);
        return new ClienteResource($cliente);
    }
    
}
