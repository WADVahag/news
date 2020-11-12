<?php

namespace App\Traits;

use Str;

trait UsesSlug{
  private static function getSluggableColumn(){
    return "name";
  }

  public static function bootUsesSlug(){

      static::creating(function($item){
          $item->slug = Str::slug($item->attributes[self::getSluggableColumn()]);
      });

      static::updating(function($item){
          $item->slug = Str::slug($item->attributes[self::getSluggableColumn()]);
      });
  }
}