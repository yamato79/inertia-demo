<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Resource\CreateResourceRequest;
use App\Http\Requests\Resource\UpdateResourceRequest;
use App\Http\Resources\ResourceResource;
use App\Models\Resource;
use App\Models\ResourceType;
use Illuminate\Support\Facades\Storage;

class ResourceController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateResourceRequest $request
     * @return ResourceResource
     */
    public function store(CreateResourceRequest $request)
    {
       $resource = Resource::create($request->validated());

        return (new ResourceResource($resource))
            ->additional([
                'meta' => [
                    'message' => 'Successfully created resource.',
                ],
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Resource $resource
     * @return ResourceResource
     */
    public function show(Resource $resource)
    {
        return new ResourceResource($resource);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateResourceRequest $request
     * @param  Resource $resource
     * @return ResourceResource
     */
    public function update(UpdateResourceRequest $request, Resource $resource)
    {
       $resource->update($request->validated());

        if ($request->filled('file') && $resource->resource_type_id === ResourceType::DOCUMENT) {
            $filePath = $request->file('file')->store('uploads/documents');

            $resource->update([
                'file_path' => $filePath,
            ]);
        }

        return (new ResourceResource($resource))
            ->additional([
                'meta' => [
                    'message' => 'Successfully updated resource.',
                ],
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Resource $resource
     * @return ResourceResource
     */
    public function destroy(Resource $resource)
    {
        if ($resource->delete()) {
            Storage::delete($resource->file_path);
        }

        return (new ResourceResource($resource))
            ->additional([
                'meta' => [
                    'message' => 'Successfully deleted resource.',
                ],
            ]);
    }
}
