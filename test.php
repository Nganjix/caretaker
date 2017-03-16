<?php
if($_FILES)
{
    $upload_dir = './images/profile/';
    $filename = time().'_'.$_FILES['filename']['name'];
    echo $_FILES['filename']['name'];
    echo("<br/>");
    echo $_FILES['filename']['type'];
    echo("<br/>");
    echo  round($_FILES['filename']['size']/1024).''.time();
    echo("<br/>");
    $filepath = $_FILES['filename']['tmp_name'];
    echo("<br/>");
    echo $_FILES['filename']['error'];
    echo("<br/>");
    //type, size, tmp_name, error
    if(move_uploaded_file($filepath, $upload_dir.basename($filename)))
    {
        echo 'uploaded and moved file successfully';
    }
    
    echo $_REQUEST['dope'];
}
?>