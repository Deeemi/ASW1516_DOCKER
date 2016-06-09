<html>
<head></head>
<body>
<?php
/* Connect to an ODBC database using driver invocation */
$dsn = 'pgsql:dbname=database;host=192.168.33.23;port=5432';
$user = 'readonly';
$password = 'readonly';

try {
    $db = new PDO('pgsql:dbname=database;host=10.10.10.20;port=5432;user=postgres;password=postgres');
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

# echo $_POST['selezione'];

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT * FROM squadra WHERE citta = ? ";

$val = $db->prepare($sql);

$val->execute(array($_POST['citta']));

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