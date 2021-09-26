<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class ResourceType extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Constants
     */
    const DOCUMENT = 1;
    const LINK = 2;
    const SNIPPET = 3;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'resource_types';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'resource_type_id';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug', 'description'];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Get the resources that belong to this resource type.
     */
    public function resources()
    {
        return $this->hasMany(Resource::class, 'resource_type_id', 'resource_type_id');
    }    
}
