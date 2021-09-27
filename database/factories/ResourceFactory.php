<?php

namespace Database\Factories;

use App\Models\Resource;
use App\Models\ResourceType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

class ResourceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Resource::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $resourceType = ResourceType::all()->random();

        return [
            'title' => $this->faker->sentence(),
            'resource_type_id' => $resourceType->getKey(),
        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (Resource $resource) {
            if ($resource->resourceType->slug == 'document') {
                $resource->update($this->getDocumentDefinition($resource));
            } else if ($resource->resourceType->slug == 'link') {
                $resource->update($this->getLinkDefinition());
            } else if ($resource->resourceType->slug == 'snippet') {
                $resource->update($this->getSnippetDefinition());
            }
        });
    }

    /**
     * Retrieve the definition for the model if the resource
     * type of the model is a document.
     * 
     * @return array
     */
    public function getDocumentDefinition(Resource $resource) {
        $fileName = 'resource_'.$resource->getKey().'_blank.txt';
        $filePath = "uploads/documents/{$fileName}";
        touch(storage_path("app/".$filePath));

        return [
            'file_path' => $filePath,
        ];
    }

    /**
     * Retrieve the definition for the model if the resource
     * type of the model is a link.
     * 
     * @return array
     */
    public function getLinkDefinition() {
        $targets = ['_blank', '_self'];

        return [
            'link' => $this->faker->url(),
            'target' => $targets[array_rand($targets)],
        ];
    }

    /**
     * Retrieve the definition for the model if the resource
     * type of the model is a snippet.
     * 
     * @return array
     */
    public function getSnippetDefinition() {
        $dom = new \DOMDocument();
        $dom->preserveWhiteSpace = false;
        $dom->loadHTML($this->faker->randomHtml(), LIBXML_HTML_NOIMPLIED);
        $dom->formatOutput = true;

        return [
            'content' => $dom->saveXML($dom->documentElement),
            'description' => $this->faker->sentence(),
        ];
    }
}
