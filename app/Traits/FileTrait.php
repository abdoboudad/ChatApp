<?php


namespace App\Traits;

trait FileTrait
{
    public function fileget(){
        $uploadedImages = [];
        if ($this->photo) {
            foreach ($this->photo as $image) {
                $path = $image->store('images','files'); // Save the image to the storage disk
                $uploadedImages[] = $path;
            }
        }
        $imagePathsString = implode(',', $uploadedImages);
        return 'this is test';
    }
}
