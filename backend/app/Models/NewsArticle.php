<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsArticle extends Model
{
    use HasFactory;

    protected $casts = ['published_at' => 'datetime:Y-m-d\TH:i:sP', 'created_at', 'updated_at'];
}
