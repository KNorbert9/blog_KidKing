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

    static public function getAllCategories(){
        return self::select('categorie.*')
        ->where('is_deleted', '=' , 0)
        ->orderBy('categorie.id', 'DESC')
        ->paginate(20);
    }
}
