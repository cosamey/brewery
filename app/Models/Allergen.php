<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, Relations};

class Allergen extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
    ];

    protected $casts = [
        'position' => 'int',
    ];

    public function products(): Relations\MorphToMany
    {
        return $this->morphedByMany(Product::class, 'allergenable');
    }
}
