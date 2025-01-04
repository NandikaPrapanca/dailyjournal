<?php 
function upload_foto($File, $oldFile = null) {    
    $uploadOk = 1;
    $hasil = array();
    $message = '';

    // File properties
    $FileName = $File['name'];
    $TmpLocation = $File['tmp_name'];
    $FileSize = $File['size'];

    // Figure out what kind of file this is
    $FileExt = explode('.', $FileName);
    $FileExt = strtolower(end($FileExt));

    // Allowed file types
    $Allowed = array('jpg', 'png', 'gif', 'jpeg');  

    // Check file size
    if ($FileSize > 500000) {
        $message .= "Sorry, your file is too large, max 500KB. ";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (!in_array($FileExt, $Allowed)) {
        $message .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed. ";
        $uploadOk = 0; 
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $message .= "Sorry, your file was not uploaded. ";
        $hasil['status'] = false; 
    } else {
        // Ensure the folder exists
        $UploadDestination = "img/";
        if (!file_exists($UploadDestination)) {
            mkdir($UploadDestination, 0777, true);
        }

        // Check if an old file exists and delete it
        if ($oldFile && file_exists($UploadDestination . $oldFile)) {
            unlink($UploadDestination . $oldFile);
        }

        // Save the file with its original name
        $NewFilePath = $UploadDestination . $FileName;
        if (move_uploaded_file($TmpLocation, $NewFilePath)) {
            $message .= "img/" . $FileName;
            $hasil['status'] = true;
            $hasil['file_name'] = $FileName; // Return the name for database update
        } else {
            $message .= "Sorry, there was an error uploading your file. ";
            $hasil['status'] = false; 
        }
    }

    $hasil['message'] = $message; 
    return $hasil;
}
?>
