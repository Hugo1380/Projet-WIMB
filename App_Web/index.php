<!DOCTYPE html>
<html>
<head>
	<meta charset ="UTF-8" />
    <title>W.I.M.B</title>
	<link href='http://fonts.googleapis.com/css?family=Roboto' rel ='stylesheet' type ='text/css' />
	<link rel ="stylesheet" href="css/style.css" type ="text/css" />
	<link rel ="icon" type ="image/png" href ="img/icon.png" />
	<?php

	try
	{
    	$db = new PDO('mysql:host=localhost;dbname=sin', 'hugo', '123');
	}
	catch (Exception $e)
	{
    	die('Erreur : ' . $e->getMessage());
	}

	?>
</head>

<body>
	<div class ="top">
		<a style="margin-bottom:10px;" href ="index.php">Accueil</a>
		<a style="margin-bottom:10px;" href ="tabs.php">Horaires</a>
		<a style="margin-bottom:10px;" href ="contact.php">Contact</a>
		<a style="margin-bottom:10px;" href ="a_propos.php">À propos</a>
		<a style="margin-bottom:10px;" href ="code_source.php">Code source</a>
	</div>

	<br />

	<div class="DLH">
		<form action="/result.php" method="post">
		<img class="DLH_img" src ="img/placeholder.png" style="width:100px;height:100px;margin: 5px;">
			<select id ="depart" name="option_depart">
				<option value ="---">- - -</option>
				<option value ="Albi">Albi</option>
				<option value ="Gaillac">Gaillac</option>
				<option value ="St-Sulpice">St-Sulpice</option>
				<option value ="Réalmont">Réalmont</option>
				<option value ="Castres">Castres</option>
			</select>
		<img class="DLH_img" src ="img/bus_line.png" style="width:100px;height:100px;margin: 5px;">
			<select id ="ligne" name="option_ligne">
				<option value ="---">- - -</option>
				<option value ="702_AS">702 (Albi - St-Sulpice)</option>
				<option value ="702_SA">702 (St-Sulpice - Albi)</option>
				<option value ="703_AC">703 (Albi - Castres)</option>
				<option value ="703_CA">703 (Castres - Albi)</option>
			</select>
		<img class="DLH_img" src ="img/clock.png" style="width:100px;height:100px;margin: 5px;">
			<select id ="heure" name="option_heure">
				<option value ="---">- - -</option>
				<option value ="8">08H00</option>
				<option value ="10">10H00</option>
				<option value ="12">12H00</option>
				<option value ="14">14H00</option>
				<option value ="16">16H00</option>
				<option value ="18">18H00</option>
			</select>
		<input type="image" src="img/search.png">
	</form>
	</div>

	<div class ="map">
		<span style="font-size: 30px;margin: 40px;">DÉPART</span>

		<br /><br />
		<br /><br />

	<div class ="map_img">
		<img id ="img_depart" src="img/bus_stop_grey.png" style="width:175px;height:175px;">
		<img id ="img_trajet" src="img/trait.png" style="width:100px;height:50px;">
		<img id ="img_arret" src="img/bus_stop_grey.png" style="width:100px;height:100px;">
		<img id ="img_trajet" src="img/trait.png" style="width:100px;height:50px;">
		<img id ="img_arrive" src="img/bus_stop_grey.png" style="width:175px;height:175px;">
	</div>
		<span style="font-size: 30px;margin: 40px;">ARRIVÉE</span>

		<br /><br /><br /><br /><br />
		<br /><br /><br /><br /><br />
		<br /><br /><br /><br /><br />
		<br /><br /><br /><br /><br />
		<br /><br /><br /><br /><br />
		<br /><br /><br /><br /><br />

	</div>
	
	<script type ="text/javascript" src ="js/redirec.js"></script>
	<script type ="text/javascript" src ="js/restriction _DLH.js"></script>
</body>
</html>