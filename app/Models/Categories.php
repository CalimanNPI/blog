<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Categories extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'id',
        'name',
        'slug',
        'description'
    ];

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(posts::class);
    }
}
