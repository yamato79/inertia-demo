<?php

namespace Database\Factories;

use App\Models\Resource;
use App\Models\ResourceType;
use Illuminate\Database\Eloquent\Factories\Factory;

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

        logger()->info('resourceType', [
            'resourceType' => $resourceType->getKey(),
        ]);

        $commonDefinition = [
            'title' => $this->faker->sentence(),
            'resource_type_id' => $resourceType->getKey(),
        ];

        $resourceTypeDefinition = [
            // This will be filled with the conditional below.
        ];
        
        if ($resourceType->slug === 'document') {
            $resourceTypeDefinition = $this->getDocumentDefinition();
        } else if ($resourceType->slug === 'link') {
            $resourceTypeDefinition = $this->getLinkDefinition();
        } else if ($resourceType->slug === 'snippet') {
            $resourceTypeDefinition = $this->getSnippetDefinition();
        }

        return array_merge($commonDefinition, $resourceTypeDefinition);
    }

    /**
     * Retrieve the definition for the model if the resource
     * type of the model is a document.
     * 
     * @return array
     */
    public function getDocumentDefinition() {
        return [
            'file_path' => storage_path('uploads/documents/blank.pdf'),
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
        return [
            'content' => $this->faker->randomHtml(),
            'description' => $this->faker->sentence(),
        ];
    }
}
