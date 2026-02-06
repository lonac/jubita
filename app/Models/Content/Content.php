<?php

namespace App\Models\Content;

use Illuminate\Database\Eloquent\Model;
use App\Models\Setting\PostType;
use App\Models\Setting\Category;
use App\Models\User;

class Content extends Model
{
    protected $fillable = [
        'title', 'slug', 'excerpt', 'content',
        'post_type_id', 'category_id', 'author_id',
        'featured_image', 'is_featured', 'status', 'published_at',
    ];

    public function postType()
    {
        return $this->belongsTo(PostType::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
