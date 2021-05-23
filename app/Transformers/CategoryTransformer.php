<?php

namespace App\Transformers;

use App\Models\Category;
use League\Fractal\TransformerAbstract;

class CategoryTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        //
    ];
    
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        //
    ];
    
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Category $category)
    {
        return [
            'id' => $category->id,
            'name' => (string) $category->name,
            'description' => (string) $category->description,
            'created_at' => (string) $category->created_at,
            'updated_at' => (string) $category->updated_at,
            'deleted_at' => isset($category->deleted_at) ? (string) $category->deleted_at : null,
        ];
    }
}