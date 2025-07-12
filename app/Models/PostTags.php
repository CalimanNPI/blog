<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PostTags extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'post_id',
        'tag_id',
    ];

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tags::class);
    }

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Posts::class);
    }
}
