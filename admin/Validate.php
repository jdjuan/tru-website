<?php

class Validate {

    var $fileError;

    function Validate() {
        $this->fileError = "";
    }

    public function isFileEmpty($file) { 
        return $file["error"] !== 0;
    }

    public function validateFile($file) {    
        // echo $this->fileError . "adsfsdafafsad";
        $target_dir = "uploads/";
        $fileName = preg_replace("/[^a-zA-Z0-9.]/", "", basename($file["name"]));
        $target_file = $target_dir . $fileName;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        $check = getimagesize($file["tmp_name"]);
        if($check === false) {
            $this->fileError = "El archivo no es una imagen.";
            return false;
        }
        // Check file size
    //REMEBER TO CHANGE THE upload_max_filesize VAR IN PHP.INI
        if ($file["size"] > 5000000) {
            $this->fileError = "El archivo es muy grande.";
            return false;
        }
    // Allow certain file formats
        if(strcmp($imageFileType, "jpg") !== 0
            && strcmp($imageFileType, "jpeg") !== 0
            && strcmp($imageFileType, "png") !== 0           
            && strcmp($imageFileType, "gif") !== 0) {
            $this->fileError = "Sólo imágenes en formato JPG, JPEG, PNG & GIF";
        return false;
    }           // update data
    if (move_uploaded_file($file["tmp_name"], $target_file)) {
        return true;
    }else{
        return false;
    }
}

public function getFileError() {  
    return ($this->fileError)."";
}
}
?>