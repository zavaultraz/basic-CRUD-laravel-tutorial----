<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
    ];
    //function relationship with news
    public function news() {
        //one to many relationship using has many
        return $this->hasMany(news::class);  
    }
}
