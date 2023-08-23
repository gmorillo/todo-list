<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Todowork extends Model
{
    use HasFactory;

    /**
     * The attributes that should be cast.
     *
     * @var array
     */

    protected $casts = [
        'category_id' => 'array',
    ];

    public function categories(){
        return $this->belongsToMany(Category::class);
    }
}
