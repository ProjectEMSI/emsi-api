<?php

namespace App\Models\Content;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Tags\HasTags;

class Article extends Model
{
    use HasFactory, HasTags;

    protected $table = 'content_articles';

    protected $fillable = [
        'content_author_id',
        'name',
        'slug',
        'content',
        'image',
        'seo_title',
        'seo_description',
        'time_to_read'
    ];

    protected $casts = [
        'content' => 'array',
        'comments_enabled' => 'boolean',
        'display_author' => 'boolean',
        'published_at' => 'datetime',
        'featured_at' => 'datetime',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'content_author_id');
    }
}
