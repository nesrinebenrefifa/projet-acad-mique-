<html>
<head>
<body style="background-color:	#d9b99b ;">

<style>/* Style de base des boutons */
input {
  background-color: whitesmoke; /* Couleur de fond */
  border: none; /* Suppression de la bordure */
  color: black; /* Couleur du texte */
  padding: 15px 32px; /* Espacement intérieur */
  text-align: center; /* Alignement du texte */
  text-decoration: none; /* Suppression du soulignement du texte */
  display: inline-block; /* Affichage en ligne */
  font-size: 16px; /* Taille de la police */
  margin: 14px 12px; /* Marge autour du bouton */
  cursor: pointer;
  padding: "20px"; /* Curseur de souris */
}

/* Style des boutons au survol */
input:hover {
  background-color: #45a049; /* Changement de couleur de fond */
}
</style>
<?php
$te=26;
$he=60;
$con=mysqli_connect("localhost","root","","action");
$dat=Date("Y-m-d");
$hour=Date("H:i:s");
$res=mysqli_query($con,"insert into valeurs (tmp,hum,date,time) values ('$te','$he','$dat','$hour') ");
?>


<?php	
$con=mysqli_connect("localhost","root","","action");
$res=mysqli_query($con,"select * from valeurs order by(time) desc limit 1 ");
if($r=mysqli_fetch_array($res,MYSQLI_NUM))
{
echo $r[0];	
echo "<br>";
echo $r[3];			
}
?>

<div id="layer1" style="position:absolute; left:572px; top:137px; width:34px; height:20px; z-index:13;">
  <form  method="GET" >
	<input type="submit" name="Submit1" value="ON" />

    
  </form>
</div>

<button>
<div id="layer2" style="position:absolute; left:639px; top:133px; width:45px; height:0px; z-index:13;">
 <form  method="GET" >
   <input type="submit" name="Submit2" value="OFF" />
  </form>

</div>
</button>
<div id="layer3" style="position:absolute; left:555px; top:209px; width:34px; height:20px; z-index:13;">
  <form  method="GET" >

	<input type="submit" name="Submit3" value="Activer" />
    
  </form>
</div>


<div id="layer4" style="position:absolute; left:639px; top:210px; width:45px; height:24px; z-index:13;">
 <form  method="GET" >
   
   <input type="submit" name="Submit4" value="Desactiver" />
  </form>

</div>

<?php 


$con=mysqli_connect("localhost","root","","action");

{
if (isset($_GET['Submit1']))
$res=mysqli_query($con,"update action set Action1='1'");
 
elseif (isset($_GET['Submit2']))
$res=mysqli_query($con,"update action set Action1='0'");
} 

{
if (isset($_GET['Submit3']))
$res=mysqli_query($con,"update action set Action2='1'");
 
elseif (isset($_GET['Submit4']))
$res=mysqli_query($con,"update action set Action2='0'");
}
?> 

<div id="layer5" style="position:absolute; left:749px; top:139px; width:144px; height:23px; z-index:13; visibility: visible;">
<form  method="GET" >
  <input type="text" placeholder="la valeur de la temperature est" name="temp"id="temp" value=
 "<?php $con=mysqli_connect("localhost","root","","action");
$res=mysqli_query($con,"select * from valeurs order by(time) desc limit 1 ");
if($r=mysqli_fetch_array($res,MYSQLI_NUM))
{
echo $r[1];	
} ?>" />
</form>
</div>

<div id="layer6" style="position:absolute; left:777px; top:212px; width:144px; height:23px; z-index:13; visibility: visible;">
<form  method="GET" >
  <input type="text" placeholder="la valeur de l'humidite est" name="hum"id="humd" value=
 "<?php $con=mysqli_connect("localhost","root","","action");
$res=mysqli_query($con,"select * from valeurs order by(time) desc limit 1 ");
if($r=mysqli_fetch_array($res,MYSQLI_NUM))
{
echo $r[0];	
} ?>" />
</form>

</div>
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
    $sql = "SELECT * FROM valeurs";
    $result = $conn->query($sql);

    // Afficher les données dans une table
    if ($result->num_rows > 0) {
        echo "<table border='1'><tr><th>Température</th><th>Humidité</th><th> gaz</th></tr>";
        // Parcourir chaque ligne de résultat
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["température"] . "</td><td>" . $row["humidité"] . "</td><td>" . $row["gaz"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 résultats";
    }
    
    // Fermer la connexion MySQLi
    $conn->close();
    ?>

</body>
</html>