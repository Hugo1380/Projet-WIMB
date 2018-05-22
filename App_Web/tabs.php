<!DOCTYPE html>
<html>
<head>
	<meta charset ="UTF-8" />
    <title>W.I.M.B</title>
	<link href='http://fonts.googleapis.com/css?family=Roboto' rel ='stylesheet' type ='text/css' />
	<link rel ="stylesheet" href="css/style.css" type ="text/css" />
	<link rel ="icon" type ="image/png" href ="img/icon.png" />
</head>

<body>
	<div class ="top">
		<a style="margin-bottom:10px;" href ="index.php">Accueil</a>
		<a style="margin-bottom:10px;" href ="tabs.php">Horaires</a>
		<a style="margin-bottom:10px;" href ="contact.php">Contact</a>
		<a style="margin-bottom:10px;" href ="a_propos.php">À propos</a>
		<a style="margin-bottom:10px;" href ="code_source.php">Code source</a>
	</div>

	<script type="text/javascript">
		//<!--
		var Onglet_afficher = 1;
			function Affiche(Nom)
			{
				document.getElementById('show-content-'+Onglet_afficher).className = 'tabs off';
				document.getElementById('show-content-'+Nom).className = 'show-content-1 onglet';
				document.getElementById('content_'+Onglet_afficher).style.display = 'none';
				document.getElementById('content_'+Nom).style.display = 'block';
				Onglet_afficher = Nom;
			}
		//-->
	</script>

	<div id="onglets">
		<ul class ="tabs">
			<li class="tabs off" id="show-content-1" onclick="javascript:Affiche('1');">Ligne 702</li>
			<li class="tabs off" id="show-content-2" onclick="javascript:Affiche('2');">Ligne 703</li>
		</ul>
			<div class="content" id="content_1">
				<img id="fiche" src="img/702_A_S.jpg">
					<br /><br />
				<img id="fiche" src="img/702_S_A.jpg">
			</div>

			<div class="content" id ="content_2">
				<img id="fiche" src="img/703_A_C.jpg">
					<br /><br />
				<img id="fiche" src="img/703_C_A.jpg">
			</div>
	</div>

	<script type="text/javascript">
		//<!--
			Affiche(Onglet_afficher);
		//-->
	</script>
	
</body>

</html>