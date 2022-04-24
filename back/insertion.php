<?php
include ('../fonction/connection.php');
if(isset($_POST['idU']) && isset($_POST['receiver']) && isset($_POST['message']))
{
	$sql= "INSERT INTO `message`(`idU`, `idR`,,`content`) VALUES (?,?,?)" ;
	$modal->setRecord($sql, array($_POST['idU'], $_POST['receiver'], $_POST['message']));
}

?>
<?php 
	$sql = "SELECT * FROM `message` WHERE (`idU` = ? OR `idU` = ?) AND (`idR` = ? OR `idR` = ?)" ;
	$recs = $modal->getAll($sql, array($_POST['idU'],$_POST['receiver'],$_POST['idU'],$_POST['receiver'])) ;
	foreach ($recs as $rec): 
	if($rec['idU'] == $_POST['idU']) :
		?>
		<div class="alert alert-success">
			<?= $rec['content'] ?>
		</div>	

		<?php
	else: ?>
		<div class="alert alert-danger">
			<?= $rec['content'] ?>
		</div>	
<?php		
	endif;
endforeach ?>
