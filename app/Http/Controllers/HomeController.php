<?php

namespace App\Http\Controllers;

use App\Models\ResourceType;
use App\Http\Resources\ResourceTypeResource;
use Inertia\Inertia;

class HomeController extends Controller
{
    /**
     * Render an Inertia.js page.
     * 
     * @return \Inertia\Response
     */
    public function index() {
        $resourceTypes = ResourceType::all();

        return Inertia::render('home', [
            'resourceTypes' => ResourceTypeResource::collection($resourceTypes),
        ]);
    }
}
