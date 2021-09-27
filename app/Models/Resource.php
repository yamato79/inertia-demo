<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resource extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'resources';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'resource_id';

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
    protected $fillable = [
        'content', 
        'description',
        'file_path',
        'link', 
        'resource_type_id',
        'target',
        'title', 
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['file_name'];

    /**
     * Get the file name from the file path.
     */
    public function getFileNameAttribute()
    {
        if (!$this->file_path) {
            return null;
        }

        $segments = explode("/", $this->file_path);
        return array_pop($segments);
    }

    /**
     * Get the message type that this message belongs to.
     */
    public function resourceType()
    {
        return $this->belongsTo(ResourceType::class, 'resource_type_id', 'resource_type_id');
    }
}
