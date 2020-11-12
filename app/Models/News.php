<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Traits\UsesSlug;

class News extends Model
{
    use HasFactory, UsesSlug;

    protected $fillable = ["title", "slug", "body", "image"];

    private static function getSluggableColumn(){
        return "title";
    }

    public function getImageUrlAttribute(){
        return asset("/storage/images/".$this->image);
    }

    public function getImageStorageUrlAttribute(){
        return storage_path("/app/public/images/".$this->image);
    }

    public function getRouteKeyName()
    {
        return "slug";
    }

    /**
     * Get news associated with this category
     * 
     * @return \Illuminate\Database\Eloquent\BelongsToMany
     */
    public function categories(){
        return $this->belongsToMany('App\Models\Category');
    }
}
