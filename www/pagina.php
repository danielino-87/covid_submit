<?php
// Recupero i valori inseriti nel form
$punto =$_GET[punto];
$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$sesso = $_POST['sesso'];


// dati di connessione al mio database MySQL
$db_host = 'localhost';
$db_user = 'danielino87';
$db_pass = 'Asroma!1218008';
$db_name = 'geolocalizzazioni';

// connessione al DB utilizzando MySQLi
$cn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// verifica su eventuali errori di connessione
if ($cn->connect_errno) {
    echo "Connessione fallita: ". $cn->connect_error . ".";
    exit();
}

// definisco la query di inserimento dati
$sql = "INSERT INTO dati (nome, cognome, sesso, punto) VALUES ("
     . "'" . $nome . "',"
     . "'" . $cognome . "',"
     . "'" . $sesso . "',"
     . "'" . $punto . "')"

// esecuzione della query
if (!$cn->query($sql)) {
  echo "Errore della query: " . $cn->error . ".";
}else{
  echo "Registrazione effettuata correttamente.";
}

// chiusura della connessione
$cn->close();