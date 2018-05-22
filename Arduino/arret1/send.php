<?php

	$line_id = $argv[1];
	$stop_id = $argv[2];
	$bus_id = $argv[3];

try {

    $db = new PDO('mysql:host=arret;dbname=sin', 'hugo', '123');
	$sql = $db->prepare("INSERT INTO schedule (date_time, line_id, stop_id, bus_id) VALUES (NOW(), :line_id, :stop_id, :bus_id)");
	$sql->bindParam(':line_id', $line_id);
	$sql->bindParam(':stop_id', $stop_id);
	$sql->bindParam(':bus_id', $bus_id);
	$sql->execute();

	$sql->debugDumpParams();
	var_dump($sql->errorInfo());

} catch (PDOException $e) {
    echo 'Échec lors de la connexion : ' . $e->getMessage();
}
