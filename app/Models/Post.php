<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'description',
        'category_id',
        'feature_image_url',
        'status',
        'created_at',
        'updated_at',
    ];

    public function category() {
        return $this->belongsTo('App\Models\Category');
    }
}
