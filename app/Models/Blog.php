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

    static public function getAllBlogs(){
        return self::select('blog.*')
        ->where('is_deleted', '=' , 0)
        ->where('status', '=' , 1)
        ->orderBy('blog.id', 'DESC')
        ->paginate(20);
    }


}
