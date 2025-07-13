<!DOCTYPE html>
<html>
<head>
    <title>Comarcas Catalunya</title>
</head>
<body>
    <h1>Comarcas Catalunya</h1><br>

    <?php 
        include_once 'database.php';
        $database = new Database();
        $db = $database->getConnection();

        echo "Catalunya tiene ";
        $sqlQuery = 'SELECT count(distinct(nomcomar)) AS num FROM municipis';
        $result = $database->queryOne($sqlQuery);
        echo $result['num'];
        echo " comarcas:";

        $sqlQuery = 'SELECT distinct(nomcomar), codicomar FROM municipis';
        $result = $database->queryAll($sqlQuery);
        echo "<ul>";
        foreach ($result as $row) {
            echo "<li><a href='comarca.php?codicomar=" . $row['codicomar'] . "'>" . $row['nomcomar'] . "</a></li>";
        }
        echo "</ul>";
    ?>
</body>
</html>