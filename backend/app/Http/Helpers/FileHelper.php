<?php

namespace App\Http\Helpers;

use Illuminate\Support\Facades\File; 

trait FileHelper{

    public function saveFile($file, $path)
    {
        $pathFile = $this->pathFile($path);
        $fileName = $file->getClientOriginalName();
        $file->move($pathFile, $fileName);
        return $fileName;
    }


    public function deleteFile($fileName, $path)
    {
        $pathFile = $this->pathFile($path, $fileName);
        if(File::exists($pathFile)){
            File::delete($pathFile);
        }
    }


    private function pathFile($path, $fileName = null)
    {
        $pathFile = public_path('images/'.$path);
        if($fileName){
            $pathFile .= '/' . $fileName;
        }
        return  $pathFile;
    }

}