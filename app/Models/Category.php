<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, Relations};
use Spatie\Sluggable\{HasSlug, SlugOptions};

class Category extends Model
{
    use HasFactory;
    use HasSlug;

    protected $fillable = [
        'name',
        'slug',
        'position',
        'parent_id',
    ];

    protected $casts = [
        'position' => 'int',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function parent(): Relations\BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children(): Relations\HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function products(): Relations\HasMany
    {
        return $this->hasMany(Product::class);
    }
}
