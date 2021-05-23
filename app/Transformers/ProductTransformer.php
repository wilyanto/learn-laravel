<?php

namespace App\Transformers;

use App\Models\Product;
use League\Fractal\TransformerAbstract;

class ProductTransformer extends TransformerAbstract
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
    public function transform(Product $product)
    {
        return [
            'id' => $product->id,
            'name' => $product->name,
            'description' => $product->description,
            'quantity' => (int) $product->quantity,
            'status' => (string) $product->status,
            'picture_url' => url("img/{$product->image}"),
            'seller_id' => (int) $product->seller_id,
            'created_at' => (string) $product->created_at,
            'updated_at' => (string) $product->updated_at,
            'deleted_at' => isset($product->deleted_at) ? (string) $product->deleted_at : null,
        ];
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            'id' => 'id',
            'name' => 'name',
            'description' => 'description',
            'quantity' => 'quantity',
            'status' => 'status',
            'picture_url' => 'image',
            'seller_id' => 'seller_id',
            'created_at' => 'created_at',
            'updated_at' => 'updated_at',
            'deleted_at' => 'deleted_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public static function transformedAttribute($index)
    {
        $attributes = [
            'id' => 'id',
            'name' => 'name',
            'description' => 'description',
            'quantity' => 'quantity',
            'status' => 'status',
            'image' => 'picture_url',
            'seller_id' => 'seller_id',
            'created_at' => 'created_at',
            'updated_at' => 'updated_at',
            'deleted_at' => 'deleted_at',
        ];

        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
