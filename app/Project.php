<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title', 'client_id', 'description'];

    public function Client()
    {
        return $this->belongsTo(Client::class);
    }
}
