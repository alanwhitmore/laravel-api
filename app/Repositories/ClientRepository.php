<?php

namespace App\Repositories;

use App\Exceptions\GeneralException;
use App\Models\Client;

/**
 * Class ClientRepository.
 */
class ClientRepository extends BaseRepository
{
    /**
     * ClientRepository constructor.
     *
     * @param Client $model
     */
    public function __construct(Client $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $input
     *
     * @throws GeneralException
     * @throws \Throwable
     *
     * @return Role
     */
    public function create(array $input)
    {
        // Make sure it doesn't already exist
        if ($this->clientExists($input['title'])) {
            throw new GeneralException('A Client already exists with the name '.e($input['title']));
        }

        $client = $this->model->create($input);

        if (isset($client->id)) {
            // Fire an client created event
            return $client;
        }

        throw new GeneralException('There was a problem creating this client. Please try again.');
    }

    /**
     * @param Role  $role
     * @param array $input
     *
     * @throws GeneralException
     * @throws \Throwable
     *
     * @return mixed
     */
    public function update(Client $client, array $input)
    {
        // If the name is changing make sure it doesn't already exist
        if ($client->title !== strtolower($input['title'])) {
            if ($this->clientExists($input['title'])) {
                throw new GeneralException('A Client already exists with the name '.e($input['title']));
            }
        }

        $status = $client->update($input);

        if ($status === true) {
            return $client;
        }

        throw new GeneralException('There was a problem updating this client. Please try again.');
    }

    /**
     * @param Client $client
     *
     * @throws GeneralException
     * @throws \Throwable
     *
     * @return mixed
     *
     * @todo don't delete client if there are projects associated.
     */
    public function delete(client $client)
    {
        //Don't delete the client if there are projects associated
        if ($client->projects()->count() > 0) {
            throw new GeneralException('You can not delete a client with associated projects.');
        }

        if ($client->delete()) {
            return true;
        }

        throw new GeneralException('There was a problem deleting this client. Please try again.');
    }

    /**
     * @param $name
     *
     * @return bool
     */
    protected function clientExists($name): bool
    {
        return $this->model
            ->where('title', strtolower($name))
            ->count() > 0;
    }
}
