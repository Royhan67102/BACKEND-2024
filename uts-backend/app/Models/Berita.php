<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Berita extends Model
{
    use HasFactory;

    protected $table = "beritas";

    protected $fillable = [
        'title', 'author', 'description', 'content', 'url', 'url_image', 'published_at', 'category','created_at', 'updated_at'
    ];
}
