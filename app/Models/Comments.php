<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comments extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'post_id',
        'user_id',
        'parent_id',

        'name',
        'email',
        'content',
        'status',
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(Posts::class);
    }

    public function user(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function comments(): BelongsTo
    {
        return $this->belongsTo(Comments::class);
    }
}
