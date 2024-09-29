<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class news extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'title',
        'image',
        'slug',
        'content'
    ];
    public function category()
    {
        //one to many relationship using belong to
        return $this->belongsTo(category::class);
    }
    public function image(): Attribute{
        return Attribute::make(
            get: fn ($value) => asset('/storage/news/' . $value), 
        );
    }
    
}
