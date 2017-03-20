<?php

class ProcessImage
{
    var $profileimg;
    var $upload_dir;
    var $temp_file;
    function __construct($fileobj, $filename, $uploaddir)
    {
        $this->upload_dir = $uploaddir;
        $this->profileimg = $filename;
        $this->temp_file = $fileobj['filename']['tmp_name'];
        
    }
    function moveImg()
    {
        return move_uploaded_file($this->temp_file, $this->upload_dir.basename($this->profileimg));
    }
}



?>