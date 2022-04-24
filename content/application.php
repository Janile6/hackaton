<?php 
$sql = "SELECT * FROM `message` WHERE `idR` = ? AND type = ? " ;
$listfile =  $modal->getAll($sql, array($_SESSION['idU'], 'apk')) ;

$sql = "SELECT count(*) as nbr FROM `message` WHERE `idR` = ? AND type = ? " ;
$file =  $modal->getOne($sql, array($_SESSION['idU'], 'apk')) ;

?>
<h4 class="text-center mt-3">Applications (<span class="font-weight-bold text-danger"><?= $file["nbr"] ?></span>)</h4>
<hr>
<div class="contentFile">
	<div class="row">
		<?php foreach ($listfile as  $listfile): ?>
			<div class="col-2 mt-3 text-center content_apk">
				<ul>
					<li><img src="../icone/icone/icon_apk.ico" alt="img" class="img img-circle"/></li>
					<li><a href="../upload/<?= $listfile['content'] ?>" download>
						<?= substr($listfile['content'], 0, 9). "...".$listfile["type"]?></a></li>
					</ul>
				</div>
			<?php endforeach ; ?>
		</div>
	</div>
