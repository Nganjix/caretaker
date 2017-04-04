<?php
session_start();
if(isset($_SESSION))
{
 class CheckImgType
 {
    var $allowtypes = array('image/png',  'image/jpg', 'image/jpeg');
    var $imgtype;
    function __construct($imgt)
    {
        $this->imgtype = $imgt;
        
    }
    function isValidImg() 
    {
        return in_array($this->imgtype, $this->allowtypes);
    } 
    
                                
 }
 class CheckSize
 {
    var $kilobytesnum = 1024;
    var $uploadedimgsize;
    function __construct($imgsize)
    {
        $this->uploadedimgsize = $imgsize;
    }
    function isValidSize()
    {
        return round($this->uploadedimgsize/$this->kilobytesnum) < 500; //image should less than 500 kb
    }
    
 }
 
 
 class Run
 {
    var $filetype;
    var $filesize;
    function __construct()
    {
        $this->filetype = $_FILES['filename']['type'];
        $this->filesize = $_FILES['filename']['size'];
    }
    function verifyImg()
    {
        $imgtypeobj = new CheckImgType($this->filetype);
        $imgsizeobj = new CheckSize($this->filesize);
        if($imgtypeobj->isValidImg() && $imgsizeobj->isValidSize())
        {
            echo '200';
        }
        else
        {
            if(!($imgsizeobj->isValidSize()))
            {
                echo 'image size exceeds maximum. a less than 500 kb image required';
            }
            if(!($imgtypeobj->isValidImg()))
            {
                echo 'Only PNG, JPG, JPEG can be uploaded';
            }
           
            
        }
    }
    
 }
 if(isset($_FILES) && isset($_FILES['filename']))
 {
    if($_FILES['filename']['name'] != '')
    {
      $runObj = new Run();
      $runObj->verifyImg();  
    }
    
 }
 else
 {
    echo ' ';
 }
    
}

?>