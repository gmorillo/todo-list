<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Todowork;

class Category extends Model
{
    use HasFactory;

    public function todoworks(){
        return $this->belongsToMany(Todowork::class);
    }
}
