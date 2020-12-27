<?php

namespace App\Models;

use App\Models\Groups;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'group_id',
        'url',
        'name',
        'description',
        'image',
        'icon',
        'status'
    ];
    //BelongsTo Relation in Laravel
    public function group()
    {
        return $this->belongsTo(Groups::class, 'group_id', 'id');
    }
}
