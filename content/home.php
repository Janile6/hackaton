<?php
session_start() ;
if(isset($_SESSION['idU'])) 
{

	include ('../fonction/connection.php');
	$sql = "SELECT * FROM user WHERE id <> ? ";
	$users = $modal->getAll($sql, array($_SESSION['idU']));
	if(empty($users))
	{
		$users = [];
	}

	if(isset($_GET['page']))
	{
		$page = $_GET['page'] ;
	}
	else
	{
		$page = "all" ;
	}
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Transfer</title>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
		<!-- <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"> -->
		<link rel="stylesheet" type="text/css" href="../css/style.css">
		<!-- <link rel="stylesheet" type="text/css" href="fontawesome/css/fontawesome.css"> -->
		<link rel="stylesheet" type="text/css" href="../css/fontawesome/css/all.css">
		<link rel="stylesheet" type="text/css" href="../css/jquery-confirm.css">
		<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"> -->

	</head>
	<body >
		<header class="header">
			<?php
			$sql = "SELECT * FROM user WHERE id = ?";
			$user = $modal->getOne($sql, array($_SESSION['idU']));
			?>
			<div class="row">
				<div class="col-1">
					<label class="lbl text-center"> <b class=""><?= $user['name'] ?> </b> </label>
				</div>
				<div class="col-3 text-center lbl h4">
					<i class="fa fa-exchange "></i>
					<input type="hidden" name="idU" class="idU pr-5" value="<?= $_SESSION['idU'] ?>">
				</div>
				<div class="col-4">
					<select name="receiver" class="custom-select custom-select-sm receiver">
						<option value="" disabled selected>Click here</option>
						<?php foreach ($users as $user) :?>
							<option value="<?= $user['id'] ?>"><?= $user['name'] ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="col-2">
<!-- 						<button class="btn btn-sm btn-outline-warning btn-block font-weight-bold sendFile">Send</button> -->
					<input type="file" id="selectedFile" style="display: none;" multiple/>
					<button class="btn btn-sm myButton font-weight-bold sendFile" type="button" value="Send"><i class="fa-solid fa-upload "></i></button>
					<!-- <input type="button" value="Send" class="btn btn-sm myButton btn-block font-weight-bold sendFile" />  -->
				</div>
				<div class="col-2 lbl">
					<a href="#" class="list-link lbl"><i class="fa fa-sign-out h5 logout lbl" aria-hidden="true"></i></a>
				</div>
			</div>

			</header>
			<main class="main">
				<aside class="aside pl-3" data-height="500px">
					<ul>
						<li class="mt-4"><a href="home.php?page=all" class="list-link"><i class="fa fa-home fa-2x"></i></a></li>
						<li class="mt-4"><a href="home.php?page=application" class="list-link"><i class="fa-brands fa-android fa-2x"></i></a></li>
						<li class="mt-4"><a href="home.php?page=photoFile" class="list-link"><i class="fa fa-image fa-2x"></i></a></li>
						<li class="mt-4"><a href="home.php?page=musicFile" class="list-link"><i class="fa fa-music fa-2x"></i></a></li>
						<li class="mt-4"><a href="home.php?page=videoFile" class="list-link"><i class="fa fa-video fa-2x"></i></a></li>
						<li class="mt-4"><a href="home.php?page=docFile" class="list-link"><i class="fa fa-file fa-2x"></i></a></li>
					</ul>
				</aside>
				<article class="aricle container">
<!-- 				<div class="container mt-2">
					Send
					<input type="hidden" name="idU" class="idU" value="<?= $_SESSION['idU'] ?>">
					<label>
						To : 
						<select name="receiver" class="receiver">
							<option value="" disabled selected>Click here</option>
							<?php foreach ($users as $user) :?>
								<option value="<?= $user['id'] ?>"><?= $user['name'] ?></option>
							<?php endforeach ?>
						</select>
					</label>
					<input type="text" name="message" class="form-control message">
					<button class="btn btn-primary mt-2 send">Envoyer</button>

					<div class="corps">

					</div>
				</div> -->
				<?php include($page.'.php') ; ?>
			</article>
		</main>
		<footer class="footer text-center w-100 ">
		<ul class="list-unstyled">
			<li>Team IFT</li>
			<li>(Institut de Formation Technique)</li>
			<li>Hackaton Inter-Universitaire 2022</li>
		</ul>
	</footer>
	</body>
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/main.js"></script>
	<script type="text/javascript" src=""></script>
	<script type="text/javascript" src="../js/jquery-confirm.js"></script>
	</html>
	<?php
} else 
header('location:../index.php');
?>
