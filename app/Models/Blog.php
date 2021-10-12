<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Category;

class Blog extends Model
{
    use HasFactory;

    public function category() {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
    // protected $fillable = [
    //     'title',
    //     'description',
    //     'slug',
    //     'image',
    //     'category_id',
    // ];
}
