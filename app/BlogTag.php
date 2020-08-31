<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogTag extends Model
{
    use SoftDeletes;
    protected $table = 'blog_tag';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'blog_id','tag_id'
    ];
    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
