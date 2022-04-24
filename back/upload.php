<?php

include ('../fonction/connection.php');

// Count total files
$countfiles = count($_FILES['files']['name']);

// Upload directory
$upload_location = "../upload/";

$count = 0;
for($i=0;$i < $countfiles;$i++){

   // File name
 $filename = $_FILES['files']['name'][$i];

   // File path
 $path = $upload_location.$filename;

 $file_extension = pathinfo($path, PATHINFO_EXTENSION);
 $file_extension = strtolower($file_extension);
      // INSERTION BASE DE DONNEE ICI
 $sql = "INSERT INTO message (idU, idR, content, type, created_at) VALUES (?,?,?,?,?)" ;

 $modal->setRecord($sql, array($_POST['idU'], $_POST['receiver'], $filename, $file_extension, date("Y-m-d H:i:s"))) ;
   // file extension
 
   // var_dump($file_extension) ;
   // Valid file extensions
   // $valid_ext = array("pdf","doc","docx","jpg","png","jpeg");

   // Check extension
   // if(in_array($file_extension,$valid_ext)){

      // Upload file
 if(!file_exists($path))
 {
  if(move_uploaded_file($_FILES['files']['tmp_name'][$i],$path)){
   $count += 1;
 }
}
   // }

}

echo $count;
