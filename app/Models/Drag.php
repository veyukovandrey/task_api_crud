<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drag extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'substance_id', 'manufacturer_id', 'price'];
}
