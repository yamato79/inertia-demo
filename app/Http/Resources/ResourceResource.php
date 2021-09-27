<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ResourceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'resource_id' => $this->resource_id,
            'resource_type_id' => $this->resource_type_id,
            'resource_type' => new ResourceTypeResource($this->whenLoaded('resourceType')),
            'content' => $this->content,
            'description' => $this->description,
            'file_path' => $this->file_path,
            'file_name' => $this->file_name,
            'link' => $this->link,
            'target' => $this->target,
            'title' => $this->title,
        ];
    }
}
