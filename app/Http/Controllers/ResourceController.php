<?php

namespace App\Http\Controllers;

use App\Http\Resources\ResourceResource;
use App\Models\Resource;
use App\Models\ResourceType;
use Inertia\Inertia;

class ResourceController extends Controller
{
    /**
     * Render an Inertia.js page for resources.
     * 
     * @return \Inertia\Response
     */
    public function index(ResourceType $resourceType) {
        $resources = $resourceType->resources;

        return Inertia::render('resources/index', [
            'resourceType' => $resourceType,
            'resources' => ResourceResource::collection($resources),
        ]);
    }

    /**
     * Download a resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function download(Resource $resource) {
        return response()->download(storage_path("app/{$resource->file_path}"));
    }
}
