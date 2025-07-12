<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Posts extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'titulo',
        'slug',
        'content',

        'author_id',
        'category_id',
        'publication_date',
        'last_update',
        'status',
        'image',
        'views',
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Categories::class);
    }

    public function comments(): BelongsTo
    {
        return $this->belongsTo(Comments::class);
    }

    public function postTags(): BelongsToMany
    {
        return $this->belongsToMany(PostTags::class);
    }
}
