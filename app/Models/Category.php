<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Traits\UsesSlug;

use App\Services\FileService;

class Category extends Model
{
    use HasFactory, UsesSlug;

    protected $fillable = ["name", "slug"];

    // used slug for protection via polimorphism 
    public function getRouteKeyName()
    {
        return "slug";
    }

    /**
     * Get news associated with this category
     * 
     * @return \Illuminate\Database\Eloquent\BelongsToMany
     */
    public function news(){
        return $this->belongsToMany('App\Models\News');
    }

    public function harakiri(){
        $this->load("news");
        $files = $this->news->pluck("image")->unique()->map(function ($url) { 
            return "images/{$url}"; 
        })->toArray();
        
        (new FileService("public"))->deleteFile($files);

        $this->news()->delete();
        $this->delete();
    }
}
