<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function comment()
    {
        return $this->morphOne(related: Comment::class, name: 'commentable');
    }

}
