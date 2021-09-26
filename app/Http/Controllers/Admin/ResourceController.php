<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\ResourceResource;
use App\Models\Resource;
use Inertia\Inertia;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        $resources = Resource::with('resourceType')->paginate();

        return Inertia::render('admin/resources/index', [
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
        return Inertia::render('admin/resources/create-edit');
    }    

    /**
     * Show the form for editing the specified resource.
     *
     * @param Resource $resource
     * @return \Inertia\Response
     */
    public function edit(Resource $resource)
    {
        return Inertia::render('admin/resources/create-edit', [
            'resource' => new ResourceResource($resource),
        ]);
    }
}
