<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Blog extends Model
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $table = 'blog';

    static public function getBlogBySlug($slug)
    {
        return self::select('blog.*', 'categorie.name as category_name', 'users.name as user_name')
            ->join('users', 'blog.user_id', '=', 'users.id')
            ->join('categorie', 'blog.categorie_id', '=', 'categorie.id')
            ->where('blog.status', '=', 1)
            ->where('blog.is_publish', '=', 1)
            ->where('blog.is_deleted', '=', 0)
            ->where('blog.slug', '=', $slug)
            ->first();
    }

    static public function getBlogs()
    {
        $return = self::select('blog.*', 'categorie.name as category_name', 'users.name as user_name')
            ->join('categorie', 'blog.categorie_id', '=', 'categorie.id')
            ->join('users', 'blog.user_id', '=', 'users.id');

        if (!empty(request('search'))) {
            $return = $return->where('blog.title', 'like', '%' . request('search') . '%');
        }
        $return = $return->where('blog.status', '=', 1)
            ->where('blog.is_publish', '=', 1)
            ->where('blog.is_deleted', '=', 0)
            ->orderBy('blog.id', 'desc')
            ->paginate(20);

        return $return;
    }

    static public function getBlogsCategories($categorie_id)
    {
        $return = self::select('blog.*', 'categorie.name as category_name', 'users.name as user_name')
            ->join('categorie', 'blog.categorie_id', '=', 'categorie.id')
            ->join('users', 'blog.user_id', '=', 'users.id')
            ->where('blog.categorie_id', '=', $categorie_id)
            ->where('blog.is_publish', '=', 1)
            ->where('blog.status', '=', 1)
            ->where('blog.is_deleted', '=', 0)
            ->orderBy('blog.id', 'desc')
            ->paginate(20);

        return $return;
    }

    static public function getRecentPost()
    {
        return self::select('blog.*', 'categorie.name as category_name', 'users.name as user_name')
            ->join('categorie', 'blog.categorie_id', '=', 'categorie.id')
            ->join('users', 'blog.user_id', '=', 'users.id')
            ->where('blog.status', '=', 1)
            ->where('blog.is_publish', '=', 1)
            ->where('blog.is_deleted', '=', 0)
            ->orderBy('blog.id', 'desc')
            ->limit(3)
            ->get();
    }

    static public function getRelatedPost($categorie_id, $id)
    {
        return self::select('blog.*', 'categorie.name as category_name', 'users.name as user_name')
            ->join('categorie', 'blog.categorie_id', '=', 'categorie.id')
            ->join('users', 'blog.user_id', '=', 'users.id')
            ->where('blog.status', '=', 1)
            ->where('blog.id', '!=', $id)
            ->where('blog.categorie_id', '=', $categorie_id)
            ->where('blog.is_publish', '=', 1)
            ->where('blog.is_deleted', '=', 0)
            ->orderBy('blog.id', 'desc')
            ->limit(5)
            ->get();
    }

    static public function getAllBlogs()
    {
        $query = self::select('blog.*', 'categorie.name as category_name', 'users.name as user_name')
            ->join('categorie', 'blog.categorie_id', '=', 'categorie.id')
            ->join('users', 'blog.user_id', '=', 'users.id');


        if (!empty(request('id'))) {
            $result = $query->where('blog.id', '=', request('id'));
        }

        if (!empty(request('username'))) {
            $result = $query->where('users.name', 'like', '%' . request('username') . '%');
        }

        if (!empty(request('title'))) {
            $result = $query->where('blog.title', 'like', '%' . request('title') . '%');
        }

        if (!empty(request('categorie'))) {
            $result = $query->where('categorie.name', 'like', '%' . request('categorie') . '%');
        }

        if (!empty(request('status'))) {
            $status = request('status');
            if ($status == 100) {
                $status = 0;
            }
            $result = $query->where('blog.status', '=', $status);
        }

        if (!empty(request('is_publish'))) {
            $is_publish = request('is_publish');
            if ($is_publish == 100) {
                $is_publish = 0;
            }
            $result = $query->Where('blog.is_publish', '=', $is_publish);
        }



        $result = $query->where('blog.is_deleted', '=', 0)
            ->orderBy('blog.id', 'DESC')
            ->paginate(10);
        return $result;
    }


    public function getImage()
    {
        if (!empty($this->image) && file_exists('upload/blog/' . $this->image)) {

            return asset('upload/blog/' . $this->image);
        } else {
            return asset('upload/blog/default.png');
        }
    }

    public function getTags()
    {
        return $this->hasMany(Tag::class, 'blog_id');
    }
}
