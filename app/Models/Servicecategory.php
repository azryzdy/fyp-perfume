<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicecategory extends Model
{
    protected $table = 'servicecategorys';
    protected $fillable = ['service_name', 'service_description', 'status'];
}
