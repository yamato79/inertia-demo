<?php

namespace Database\Seeders;

use App\Models\Resource;
use App\Models\ResourceType;
use Illuminate\Database\Seeder;

class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ResourceType::all()->each(function ($resourceType) {
            Resource::factory(3)->state([
                'resource_type_id' => $resourceType->getKey(),
            ])->create();
        });
    }
}
