<?php 
include ('../fonction/connection.php');
if(isset($_POST['idU']) and isset($_POST['receiver']))
{
	if(!empty($_POST['idU']) and !empty($_POST['receiver']))
	{
		if($_POST['type'] == '')
		{
			$sql = "SELECT * FROM `message` WHERE `idU` = ? AND `idR` = ? " ;
			$listfile =  $modal->getAll($sql, array($_POST['idU'], $_POST['receiver'])) ;

			$sql = "SELECT count(*) as nbr FROM `message` WHERE `idU` = ? AND `idR` = ? " ;
			$file =  $modal->getAll($sql, array($_POST['idU'], $_POST['receiver'])) ;
		}
		else
		{
			$sql = "SELECT * FROM `message` WHERE `idU` = ? AND `idR` = ? AND type = ? " ;
			$listfile =  $modal->getAll($sql, array($_POST['receiver'], $_POST['idU'],$_POST['type'] )) ;

			$sql = "SELECT count(*) as nbr FROM `message` WHERE `idU` = ? AND `idR` = ?  AND type = ?  " ;
			$file =  $modal->getAll($sql, array($_POST['receiver'], $_POST['idU'], $_POST['type'])) ;
		}
	}
}
$imgType = ['jpg','jpeg','png','gif', 'webp','ico', 'bmp'];
$musicType = ['mp3','mmf','wma','m4a'];
$videoType = ['mp4','mkv','gif','webm','avi','flv'];
$docType = ['doc','docx','xlsx', 'xls','pdf','pptx','ppt','txt','sql'];
$i=0 ;
?>
		<div class="row">
		<?php foreach ($listfile as  $listfile): ?>
			<div class="mt-3 col-2 text-center content_apk">
					<?php if(in_array($listfile["type"], $imgType)): ?>
						<ul>
							<li><img src="../icone/icone/pics.ico" alt="img" class="img img-circle"/></li>
							<li><a href="../upload/<?= $listfile['content'] ?>" download>
								<?= substr($listfile['content'], 0, 9). "...".$listfile["type"]?></a></li>
							</ul>
							<?php elseif(in_array($listfile["type"], $musicType)):?>	
								<ul>
									<li><img src="../icone/icone/musics.ico" alt="img" class="img img-circle"/></li>
									<li><a href="../upload/<?= $listfile['content'] ?>" document>
										<?= substr($listfile['content'], 0, 9). "...".$listfile["type"]?></a></li>
									</ul>
									<?php elseif($listfile["type"] == "apk"):?>	
										<ul>
											<li><img src="../icone/icone/icon_apk.ico" alt="img" class="img img-circle"/></li>
											<li><a href="../upload/<?= $listfile['content'] ?>" download>
												<?= substr($listfile['content'], 0, 9). "...".$listfile["type"]?></a></li>
											</ul>
											<?php elseif(in_array($listfile["type"], $videoType)):?>	
												<ul>
													<li><img src="../icone/icone/videos.ico" alt="img" class="img img-circle"/></li>
													<li><a href="../upload/<?= $listfile['content'] ?>" document>
														<?= substr($listfile['content'], 0, 9). "...".$listfile["type"]?></a></li>
													</ul>
													<?php elseif(in_array($listfile["type"], $docType)):?>	
														<ul>
															<li><img src="../icone/icone/docs.ico" alt="img" class="img img-circle"/></li>
															<li><a href="../upload/<?= $listfile['content'] ?>" download>
																<?= substr($listfile['content'], 0, 9). "...".$listfile["type"]?></a></li>
															</ul>
															<?php else :?>	
																<?= $listfile['content'].' '.$listfile['type'].' '.$listfile['created_at']  ?>
															<?php endif?>
														</div>
														<?php
													endforeach ;
													?>
												</div>
<?php echo '@@&&'.json_encode($file) ; ?>

