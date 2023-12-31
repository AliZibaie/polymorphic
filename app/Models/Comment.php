<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Comment extends Model
{
    use HasFactory;
    public function image() : MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    protected $fillable = [
      'content',
      'comment_id',
      'post_id',
    ];
}
