<?php

namespace App\Models\Content;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Short extends Model
{
    use HasFactory;

    protected $table = 'content_shorts';

    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class, 'content_article_id');
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'content_author_id');
    }
}
