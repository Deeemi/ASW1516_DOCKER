<html>
<head></head>
<body>
<?php
/* Connect to an ODBC database using driver invocation */
$dsn = 'pgsql:dbname=database;host=192.168.99.100;port=5432';
$user = 'postgres';
$password = 'postgres';

try {
    $db = new PDO('pgsql:dbname=database;host=192.168.99.100;port=5432;user=postgres;password=postgres');
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

# echo $_POST['selezione'];

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT * FROM squadra WHERE stadio = ? ";

$val = $db->prepare($sql);

$val->execute(array($_POST['stadio']));


foreach ($val as $row) {
        print $row['nomesquadra'] . "\n";
        print $row['citta'] . "\n";
        print $row['annofondazione'] . "\n";
        print $row['stadio'] . "<br/>";
        echo "<br/>";
           }
$db = null;

?>
</body>
</html>