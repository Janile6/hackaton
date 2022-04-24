<?php 
include ('../fonction/connection.php');
$sql = "SELECT count(*) as nbr FROM `message` WHERE `idR` = ? " ;
$file =  $modal->getAll($sql, array($_POST['idU'])) ;
// if(isset($_POST['idU']) and isset($_POST['receiver']))
// {
// 	if(!empty($_POST['idU']) and !empty($_POST['receiver']))
// 	{
// 		if($_POST['type'] == '')
// 		{
// 			$sql = "SELECT * FROM `message` WHERE `idU` = ? AND `idR` = ? " ;
// 			$listfile =  $modal->getAll($sql, array($_POST['idU'], $_POST['receiver'])) ;

// 			$sql = "SELECT count(*) as nbr FROM `message` WHERE `idU` = ? AND `idR` = ? " ;
// 			$file =  $modal->getAll($sql, array($_POST['idU'], $_POST['receiver'])) ;
// 		}
// 		else
// 		{
// 			$sql = "SELECT * FROM `message` WHERE `idU` = ? AND `idR` = ? AND type = ? " ;
// 			$listfile =  $modal->getAll($sql, array($_POST['receiver'], $_POST['idU'],$_POST['type'] )) ;

// 			$sql = "SELECT count(*) as nbr FROM `message` WHERE `idU` = ? AND `idR` = ?  AND type = ?  " ;
// 			$file =  $modal->getAll($sql, array($_POST['receiver'], $_POST['idU'], $_POST['type'])) ;
// 		}
// 	}
// }
$imgType = ['jpg','jpeg','png','gif', 'webp','ico', 'bmp'];
$musicType = ['mp3','mmf','wma','m4a'];
$videoType = ['mp4','mkv','gif','webm','avi','flv'];
$docType = ['doc','docx','xlsx', 'xls','pdf','pptx','ppt','txt','sql'];
$i=0 ;
?>

<?php 
$sql = "SELECT * FROM user WHERE id <> ?  " ;
$allusers =  $modal->getAll($sql, array($_POST['idU'])) ;
?>

<?php foreach ($allusers as $alluser): 

	$sql="SELECT * FROM `message` WHERE `idU` = ? AND `idR` = ? " ;
	$listfile = $modal->getAll($sql, array($alluser['id'],$_POST['idU'])) ;	

	if(!empty($listfile))
	{
		?>

		<h5 class="font-weight-bold mt-2">File from : <span class="text-info"><?= $alluser['name'] ?></span></h5>
		<div class="row">
			<?php foreach ($listfile as  $listfile): ?>
				<div class="mt-3 col-2 text-center content_apk">
					<?php 
					if (in_array($listfile["type"], $imgType))
					{
						$icone = "../icone/icone/pics.ico" ;
					}
					else if(in_array($listfile["type"], $musicType))
					{
						$icone = "../icone/icone/musics.ico" ;
					}
					else if(in_array($listfile["type"], $videoType))
					{
						$icone = "../icone/icone/videos.ico" ;
					}
					else if(in_array($listfile["type"], $docType))
					{
						$icone = "../icone/icone/docs.ico" ;
					}
					else
					{
						$icone = "../icone/icone/icon_apk.ico" ;
					}


					?>
					<ul>
						<li><img src="<?= $icone ?>" alt="img" class="img img-circle"/></li>
						<li><a href="../upload/<?= $listfile['content'] ?>" download>
							<?= substr($listfile['content'], 0, 9). "...".$listfile["type"]?></a></li>
						</ul>

					</div>
					<?php
				endforeach ;

				?>
			</div>
			<?php
		}
	endforeach ?>
</div>
<?php echo '@@&&'.json_encode($file) ; ?>

