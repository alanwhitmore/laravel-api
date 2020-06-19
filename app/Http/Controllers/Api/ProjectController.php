<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectResource;
use App\Project;

class ProjectController extends Controller
{
    public function Index()
    {
        $projects = Project::with('client')->paginate(10);

        return ProjectResource::collection($projects);
    }
}
