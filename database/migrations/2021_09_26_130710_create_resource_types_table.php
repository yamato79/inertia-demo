<?php

use App\Models\ResourceType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class CreateResourceTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resource_types', function (Blueprint $table) {
            $table->id('resource_type_id');
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('slug');
            $table->softDeletes();
            $table->timestamps();
        });

        $this->seed();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resource_types');
    }

    /**
     * Seed system-required data for the migrations.
     */
    public function seed()
    {
        $resourceTypes = collect([
            [
                'name' => 'PDF',
                'slug' => Str::slug('Document'),
                'description' => 'Files that contain important information.'
            ],
            [
                'name' => 'Link',
                'slug' => Str::slug('Link'),
                'description' => 'A reference to other locations.'
            ],
            [
                'name' => 'HTML Snippet',
                'slug' => Str::slug('Snippet'),
                'description' => 'Small portions of source code in HTML markup.',
            ],
        ]);

        $resourceTypes->each(function ($resourceType) {
            ResourceType::create($resourceType);
        });
    }
}
