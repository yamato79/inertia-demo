<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->id('resource_id');
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('file_path')->nullable();
            $table->string('link')->nullable();
            $table->text('content')->nullable();
            $table->enum('target', ['_blank', '_self', '_parent', '_top'])->nullable();
            $table->foreignId('resource_type_id')->constrained('resource_types', 'resource_type_id');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resources');
    }
}
