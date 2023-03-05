<?php

namespace App\Models;

use App\Casts\Money;
use App\Enums\ProductStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Builder, Model, Relations};
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\{HasMedia, InteractsWithMedia};
use Spatie\Sluggable\{HasSlug, SlugOptions};

class Product extends Model implements HasMedia
{
    use HasFactory;
    use HasSlug;
    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'brand_id',
        'status',
        'is_featured',
        'stock',
        'description',
        'tax_rate',
        'price',
        'attributes',
    ];

    protected $casts = [
        'status' => ProductStatus::class,
        'is_featured' => 'bool',
        'stock' => 'int',
        'tax_rate' => 'int',
        'price' => Money::class,
        'attributes' => 'json',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('thumbnail')
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/webp'])
            ->withResponsiveImages()
            ->singleFile();
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', ProductStatus::Active);
    }

    public function scopeFeatured(Builder $query, bool $value = true): Builder
    {
        return $query->where('is_featured', $value);
    }

    public function image(): Relations\MorphOne
    {
        return $this->morphOne(Media::class, 'model')
            ->where('collection_name', 'thumbnail');
    }

    public function category(): Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function brand(): Relations\BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function allergens(): Relations\MorphToMany
    {
        return $this->morphToMany(Allergen::class, 'allergenable');
    }
}
