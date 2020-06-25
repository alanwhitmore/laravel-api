<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Project extends Model
{
    /**
     * Fillable Database Fields
     *
     * @var array
     */
    protected $fillable = ['title', 'client_id', 'description'];


    /**
     * Client Belongs to Projects
     *
     * @return mixed
     */
    public function clients()
    {
        return $this->belongsTo(Client::class);
    }
}
