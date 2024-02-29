<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Blog extends Model
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $table = 'blog';

    static public function getAllBlogs()
    {
        return self::select('blog.*', 'categorie.name as category_name', 'users.name as user_name')
            ->join('categorie', 'blog.categorie_id', '=', 'categorie.id')
            ->join('users', 'blog.user_id', '=', 'users.id')
            ->where('blog.is_deleted', '=', 0)
            ->orderBy('blog.id', 'DESC')
            ->paginate(20);
    }

    public function getImage()
    {
        if (!empty($this->image) && file_exists('upload/blog/' . $this->image)) {

            return asset('upload/blog/' . $this->image);
        }else{
            return asset('upload/blog/default.png');
        }
    }
}
