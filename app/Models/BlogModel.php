<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogModel extends Model
{
        use HasFactory;

    protected $table = "_blogs";

     protected $fillable = [
        'id',
        'name',
        'slug',
        'status'
     ];

}
