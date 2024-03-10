<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Categorie extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'categorie';

    static public function getAllCategories()
    {
        return self::select('categorie.*')
            ->where('is_deleted', '=', 0)
            ->orderBy('categorie.id', 'DESC')
            ->paginate(20);
    }

    public function totalBlogs()
    {
        return $this->hasMany(Blog::class, 'categorie_id')
            ->where('blog.status', '=', 1)
            ->where('blog.is_publish', '=', 1)
            ->where('blog.is_deleted', '=', 0)
            ->count();
    }

    static public function getCategoryMenu()
    {
        return self::select('categorie.*')
            ->where('categorie.is_deleted', '=', 0)
            ->where('categorie.status', '=', 1)
            ->get();
    }

    static public function getSlug($slug)
    {
        return self::select('categorie.*')
            ->where('categorie.is_deleted', '=', 0)
            ->where('categorie.status', '=', 1)
            ->where('categorie.slug', '=', $slug)
            ->first();
    }
}
