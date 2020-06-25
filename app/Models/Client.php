<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['title'];

    /**
     * Client will have many projects.
     *
     * @return mixed
     */
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
