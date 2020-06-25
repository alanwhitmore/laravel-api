<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectResource;
use App\Models\Project;

class ProjectController extends Controller
{
    public function Index()
    {
        $projects = Project::with('client')->paginate(10);

        return ProjectResource::collection($projects);
    }
}
