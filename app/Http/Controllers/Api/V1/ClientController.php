<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\StoreClientRequest;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use App\Repositories\ClientRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @group Clients
 *
 * Managing Clients
 *
 * Class ClientController.
 */
class ClientController extends APIController
{
    /**
     * Client Repository Object.
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
     * GET clients.
     *
     * List all the clients
     *
     * @param Request $request
     *
     * @queryParam paginate which page to show. Example :12
     * @queryParam orderBy order by accending and descending. Example :ASC or DESC
     * @queryParam sortBy  Sort By any database column. Example :created_at
     *
     * @apiResourceCollection App\Http\Resources\ClientResource
     * @apiResourceModel App\Models\Client paginate=10
     *
     * @response 200 {
     * "data":[{"id":1,"title":"FasTrax"},{"id":2,"title":"Smocker Choice"},{"id":3,"title":"TCS"}],"links":{"first":"http://localhost:8000/api/v1/clients?page=1","last":"http://localhost:8000/api/v1/clients?page=4","prev":null,"next":"http://localhost:8000/api/v1/clients?page=2"},"meta":{"current_page":1,"from":1,"last_page":4,"path":"http://localhost:8000/api/v1/clients","per_page":"5","to":5,"total":19}
     * }
     *
     * @return \Illuminate\Http\JsonResponse
     */
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
     * GET Client.
     *
     * Return the Specific Client.
     *
     * @param Client $client
     *
     * @queryParam clientId id of the client. Example :1
     *
     * @apiResource App\Http\Resources\ClientResource
     * @apiResourceModel App\Models\Client
     *
     * @response 200 {
     *  "data":{"id":1,"title":"FasTrax"}
     * }
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Client $client)
    {
        return new ClientResource($client);
    }

    /**
     * POST Client.
     *
     * Create the Client.
     *
     * @param StoreClientRequest $request
     *
     * @bodyParam title string required Name of the Client. Example: "FasTrax"
     *
     * @apiResource App\Http\Resources\ClientResource
     * @apiResourceModel App\Models\Client
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreClientRequest $request)
    {
        $client = $this->repository->create($request->all());

        return new ClientResource($client);
    }

    /**
     * Update Client.
     *
     * Update the Client.
     *
     * @param Client             $client
     * @param StoreClientRequest $request
     *
     * @bodyParam title string required Name of the Client. Example: "FasTrax"
     *
     * @apiResource App\Http\Resources\ClientResource
     * @apiResourceModel App\Models\Client
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Client $client, StoreClientRequest $request)
    {
        $client = $this->repository->update($client, $request->all());

        return new ClientResource($client);
    }

    /**
     * Delete Client.
     *
     * Delete the Client.
     *
     * @param Client $client
     *
     * @bodyParam id integer required Id of the client. Example: 1
     *
     * @response {"message": "The Client was successfully deleted."}
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Client $client)
    {
        $this->repository->delete($client);

        return $this->respond([
            'message' => 'The Client was successfully deleted.',
        ]);
    }
}
