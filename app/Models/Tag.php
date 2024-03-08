<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';

    static public function InsertDeleteTag($blog_id, $tag)
    {
        Tag::where('blog_id', '=', $blog_id)->delete();

        if (!empty($tag)) {
            $tag = explode(',', $tag);

            foreach ($tag as $value) {
                $tag = new Tag();
                $tag->blog_id = $blog_id;
                $tag->name = trim($value);
                $tag->save();
            }
        }
    }

    
}
