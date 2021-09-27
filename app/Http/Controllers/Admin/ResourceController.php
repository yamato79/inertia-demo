<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\ResourceTypeResource;
use App\Http\Resources\ResourceResource;
use App\Models\ResourceType;
use App\Models\Resource;
use Illuminate\Http\Request;
use Inertia\Inertia;
class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index(Request $request)
    {
        $resourceTypes = ResourceType::all();
        $resources = Resource::with('resourceType')
            ->when($request->filled('resource_type_id'), function ($query) use ($request) {
                $query->where('resource_type_id', $request->get('resource_type_id'));
            })
            ->orderBy('resource_type_id')
            ->orderBy('title')
            ->paginate(10)
            ->withQueryString();

        return Inertia::render('admin/resources/index', [
            'resourceTypeId' => $request->get('resource_type_id'),
            'resourceTypes' => ResourceTypeResource::collection($resourceTypes),
            'resources' => ResourceResource::collection($resources),
        ]);
    }

    /**
     * Show the form for create the specified resource.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        $resourceTypes = ResourceType::all();
        return Inertia::render('admin/resources/create-edit', [
            'resourceTypes' => ResourceTypeResource::collection($resourceTypes),
        ]);
    }    

    /**
     * Show the form for editing the specified resource.
     *
     * @param Resource $resource
     * @return \Inertia\Response
     */
    public function edit(Resource $resource)
    {
        $resourceTypes = ResourceType::all();
        return Inertia::render('admin/resources/create-edit', [
            'resourceTypes' => ResourceTypeResource::collection($resourceTypes),
            'resource' => new ResourceResource($resource),
        ]);
    }
}
