<?php

namespace App\Http\Controllers\Api;

use App\Client;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientRequest;
use App\Http\Resources\ClientResource;
use Symfony\Component\HttpFoundation\Response;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::select('id', 'title')->get();

        return ClientResource::collection($clients);
    }

    public function show(Client $client)
    {
        return new ClientResource($client);
    }

    public function store(StoreClientRequest $request)
    {
        $client = Client::create($request->all());

        return new ClientResource($client);
    }

    public function update(Client $client, StoreClientRequest $request)
    {
        $client->update($request->all());

        return new ClientResource($client);
    }

    public function destroy(Client $Client)
    {
        $Client->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
