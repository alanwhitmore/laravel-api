<?php

namespace App\Http\Controllers\Api;

use App\Models\Client;
use App\Http\Requests\StoreClientRequest;
use App\Http\Resources\ClientResource;
use App\Repositories\ClientRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class ClientController
 */
class ClientController extends APIController
{
    /**
     * Client Repository Object
     *
     * @var object
     */
    protected $repository;

    /**
     * __construct.
     *
     * @param $repository
     */
    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Return the Clients
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    /** */
    public function index(Request $request)
    {
        $limit = $request->get('paginate') ? $request->get('paginate') : 25;
        $orderBy = $request->get('orderBy') ? $request->get('orderBy') : 'ASC';
        $sortBy = $request->get('sortBy') ? $request->get('sortBy') : 'created_at';

        return ClientResource::collection(
            $this->repository->query()->orderBy($sortBy, $orderBy)->paginate($limit)
        );
    }

    /**
     * Return the Specific Client
     *
     * @param Client $client
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Client $client)
    {
        return new ClientResource($client);
    }

    /**
     * Create the Client
     *
     * @param StoreClientRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreClientRequest $request)
    {

        $client = $this->repository->create($request->all());

        return new ClientResource($client);
    }

    /**
     * Update the Client
     *
     * @param Client $client
     * @param StoreClientRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Client $client, StoreClientRequest $request)
    {
        $client = $this->repository->update($client, $request->all());

        return new ClientResource($client);
    }

    /**
     * Delete the Client
     *
     * @param Client $client
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Client $client)
    {
        $this->repository->delete($client);

        return $this->setStatusCode(Response::HTTP_NO_CONTENT)->respond([
            'message' => 'The Client was successfully deleted.',
        ]);

    }
}
