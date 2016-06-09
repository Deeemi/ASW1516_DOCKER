<html>
<head></head>
<body>
<?php
/* Connect to an ODBC database using driver invocation */
$dsn = 'pgsql:dbname=database;host=172.17.0.3;port=5432';
$user = 'postgres';
$password = 'postgres';

try {
    $db = new PDO('pgsql:dbname=database;host=10.10.10.20;port=5432;user=postgres;password=postgres');
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT * FROM calciatore WHERE ruolo = ? ";

$val = $db->prepare($sql);

$val->execute(array($_POST['ruolo']));

foreach ($val as $row) {
        print $row['nome'] . "\n";
        print $row['cognome'] . "\n";
        print $row['nascita'] . "\n";
        print $row['nazione'] . "\n";
        print $row['ruolo'] . "\n";
        print $row['squadra'] . "<br/>";
        echo "<br/>";
           }
$db = null;

?>
</body>
</html>