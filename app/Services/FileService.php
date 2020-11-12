<?php

namespace App\Services;

use Illuminate\Http\Request;

use Storage;

class FileService{

  public $disk;

  public function __construct($disk = "public"){
    $this->disk = $disk;
  }

  public function storeFileGetUrl(Request $request, $fileKey, $directory){

    $file = $request->file($fileKey);

    $name = time() . "." . $file->extension();

    Storage::disk($this->disk)->putFileAs($directory, $file, $name);
  
    return $name;
  }

  public function deleteFile($path){   // path can be both a string and an array
    Storage::disk($this->disk)->delete($path);

    return true;
  }
}