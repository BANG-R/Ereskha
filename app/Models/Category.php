<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
    ];

    /**
     * Get the products for the category.
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Get the image URL or placeholder.
     */
    public function getImageUrlAttribute(): string
    {
        if ($this->image) {
            return asset('uploads/' . $this->image);
        }
        return 'https://placehold.co/400x400/1a2b5f/ffffff?text=' . urlencode($this->name);
    }
}
