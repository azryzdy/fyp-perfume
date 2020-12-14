<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicelist extends Model
{
    protected $table = 'servicelists';
    protected $fillable = ['serv_cate_id', 'title', 'description','amount','price','image'];

    public function service_category()
    {
        return $this->belongsTo(Servicecategory::class, 'serv_cate_id', 'id');
    }
}
