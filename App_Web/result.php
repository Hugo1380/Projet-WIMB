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

<?php

if (!isset($_POST['option_depart']) || !isset($_POST['option_ligne']) || !isset($_POST['option_heure'])){
	header('Location: index.php'); 
}else{
	$option_depart = $_POST['option_depart'];
	$option_ligne = $_POST['option_ligne'];
	$option_heure = $_POST['option_heure'];
}

if($option_depart == '---' || $option_ligne == '---' || $option_heure == '---'){
	header('Location: index.php');
}

if(($option_depart == 'Réalmont' || $option_depart == 'Castres') && ($option_ligne == '702_AS' || $option_ligne == '702_SA')){
	header('Location: impossible.php');
}

if(($option_depart == 'Gaillac' || $option_depart == 'St-Sulpice') && ($option_ligne == '703_AC' || $option_ligne == '703_CA')){
	header('Location: impossible.php');
}

switch($option_depart){
	case 'Albi':
	$option_depart = 6;
	break;
	case 'Castres':
	$option_depart = 8;
	break;
	case 'Réalmont':
	$option_depart = 5;
	break;
	case 'St-Sulpice':
	$option_depart = 9;
	break;
	case 'Gaillac':
	$option_depart = 7;
	break;
}

switch($option_ligne){
	case '703_AC':
	$option_ligne_id = 2;
	break;
	case '703_CA':
	$option_ligne_id = 2;
	break;
	case '702_AS':
	$option_ligne_id = 3;
	break;
	case '702_SA':
	$option_ligne_id = 3;
	break;
}

// var_dump($option_depart); :debug
// var_dump($option_ligne); :debug
// var_dump($option_heure); :debug

$date = new DateTime();

switch($option_heure){
	case 8:
	$option_heure_datetime = $date;
	$option_heure_datetime->setTime(8, 0);
	$formattedDate = $option_heure_datetime->format('Y-m-d H:i:s');
	break;
	case 10:
	$option_heure_datetime = $date;
	$option_heure_datetime->setTime(10, 0);
	$formattedDate = $option_heure_datetime->format('Y-m-d H:i:s');
	break;
	case 12:
	$option_heure_datetime = $date;
	$option_heure_datetime->setTime(12, 0);
	$formattedDate = $option_heure_datetime->format('Y-m-d H:i:s');
	break;
	case 14:
	$option_heure_datetime = $date;
	$option_heure_datetime->setTime(14, 0);
	$formattedDate = $option_heure_datetime->format('Y-m-d H:i:s');
	break;
	case 16:
	$option_heure_datetime = $date;
	$option_heure_datetime->setTime(16, 0);
	$formattedDate = $option_heure_datetime->format('Y-m-d H:i:s');
	break;
	case 18:
	$option_heure_datetime = $date;
	$option_heure_datetime->setTime(18, 0);
	$formattedDate = $option_heure_datetime->format('Y-m-d H:i:s');
	break; 
}

$sql = $db->prepare('SELECT stop_id FROM schedule WHERE date_time = :option_heure_datetime OR date_time > :option_heure_datetime AND line_id = :line_id');
$sql->bindParam(':option_heure_datetime', $formattedDate);
$sql->bindParam(':line_id', $option_ligne_id);
$sql->execute();
$result = $sql->fetchAll();
// var_dump($result); :debug

$imageNumber1 = "img/bus_stop_green.png";
$imageNumber2 = "img/bus_stop_green.png";
$imageNumber3 = "img/bus_stop_green.png";
$imageNumberTrait1 = "img/trait.png";
$imageNumberTrait2 = "img/trait.png";

foreach($result as $row) {
    switch($row['stop_id']){
		case '6':
		$imageNumber1 = "img/bus_stop_red.png";
		break;
		case '10':
		$imageNumber1 = "img/bus_stop_red.png";
		break;
		case '5':
		$imageNumber2 = "img/bus_stop_red.png";
		break;
		case '7':
		$imageNumber2 = "img/bus_stop_red.png";
		break;
		case '8':
		$imageNumber3 = "img/bus_stop_red.png";
		break;
		case '9':
		$imageNumber3 = "img/bus_stop_red.png";
		break;
	}
}

if($option_ligne == '703_AC' && $option_depart == 5){
	$imageNumber1 = "img/vide.png";
	$imageNumberTrait1 = "img/vide.png";
}

if($option_ligne == '703_CA' && $option_depart == 5){
	$imageNumber3 = "img/vide.png";
	$imageNumberTrait2 = "img/vide.png";
}

if($option_ligne == '702_AS' && $option_depart == 7){
	$imageNumber1 = "img/vide.png";
	$imageNumberTrait1 = "img/vide.png";
}

if($option_ligne == '702_SA' && $option_depart == 7){
	$imageNumber3 = "img/vide.png";
	$imageNumberTrait2 = "img/vide.png";
}

?>

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
		<img src="<?php echo $imageNumber1 ?>" style="width:175px;height:175px;">
		<img src="<?php echo $imageNumberTrait1 ?>" style="width:100px;height:50px;">
		<img src="<?php echo $imageNumber2 ?>" style="width:100px;height:100px;">
		<img src="<?php echo $imageNumberTrait2 ?>" style="width:100px;height:50px;">
		<img src="<?php echo $imageNumber3 ?>" style="width:175px;height:175px;">

	</div>

		<span style="font-size: 30px;margin: 40px;">ARRIVÉE</span>

		<br /><br /><br /><br /><br />
		<br /><br /><br /><br /><br />
		<br /><br /><br /><br /><br />
		<br /><br /><br /><br /><br />
		<br /><br /><br /><br /><br />
		<br /><br /><br /><br /><br />

	</div>

</body>
</html>