<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $table = 'subcategorys';
    protected $fillable = ['category_id', 'name', 'url', 'description', 'image', 'priority', 'status'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    protected $appends = array("link");

    public function getLinkAttribute()
    {
        return "https://pstore.sytes.net/uploads/subcategory/" . $this->image;
    }
}
