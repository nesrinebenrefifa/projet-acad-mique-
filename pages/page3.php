<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color: antiquewhite; ">
    <h1 id="GAZ">GAZ</h1>
    <h2>Contenu de la section gaz...</h2>
    <img style="float: left;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQhKRxzdwO0qUEIROwDAF9J6JK6Dz2TaXr1Eg&s" alt="">
    <?php
    // Établir une connexion à la base de données MySQL
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "firebase";

    // Créer une connexion MySQLi
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($conn->connect_error) {
        die("Connexion échouée: " . $conn->connect_error);
    }

    // Exécuter une requête SQL pour récupérer les données
    $sql = "SELECT gaz FROM valeurs ORDER BY gaz DESC LIMIT 5";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo "<h3>La valeur du gaz est :</h3>";
        // Parcourir chaque ligne de résultat
        while ($row = $result->fetch_assoc()) {
            echo $row["gaz"] . "<br>";
        }
    } else {
        echo "0 résultats";
    }
    
    
    // Fermer la connexion MySQLi
    $conn->close();
    ?>
</body>
</html>