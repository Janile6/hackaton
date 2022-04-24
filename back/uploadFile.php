
<?php 
include('connect.php');
$target_dir = "../image/identite/";
$base64 = $_POST['finalFile'] ;
$ext_data = $_POST['ext_data'] ;

$partie_image = explode(";base64,",$base64);

// var_dump($partie_image) ;
// die() ;

$tmp_name = base64_decode($partie_image[1]);



$imageFileType = explode('/',$ext_data)[1] ;



if($imageFileType == "jpg" or $imageFileType == "png" or $imageFileType == "jpeg"
	or $imageFileType == "gif" ) 
{

		$sql = "SELECT * FROM `eleve`  WHERE ? ORDER BY `matricule` DESC LIMIT 1" ;
		$reclast = $ecole->getOne($sql, array(1));

		if(!$reclast)
		{
			$nomPhoto = 'FILE'.date('Ymd').'00.'.$imageFileType ;
		}else
		{

		}

		$target_file = $target_dir.$imageFileType;

		file_put_contents($target_file, $tmp_name) ;

		echo $target_file ;

}
else
{
	echo 'erreur be' ;
}




?>