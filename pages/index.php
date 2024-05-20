<!DOCTYPE html>
<html>
<head>
    <title>Affichage des données</title>
</head>


<body style="background-color:	#aec6cf ;">

    <nav>
        <ul>
            <li  ><button  onclick="allerPage1()"><a  href="#TEMP">Température</button></a></li>
            <li> <button  onclick="allerPage2()"><a href="#HUM">Humidité</button></a></li>
            <li><button  onclick="allerPage3()"><a href="#GAZ">Valeur-Gaz</></button></a></li>
          
        </ul>
    </nav>
    <style>
        


body {
    padding: 0;
    margin: 0;
   
  
    justify-content:center;
    align-items: center;
    color: #333;
    /* Text color */
    font-family: 'Poppins', sans-serif;
    font-size: larger;
    font-weight: 400;
    text-align: center;
    justify-content: space-between;
}
button {
            display: inline-block;
            background-color:#aec6cf; /* couleur de fond */
            padding: 10px 20px; /* marge intérieure */
            border: none; /* suppression de la bordure */
            font-family: 'Poppins', sans-serif;
            font-size: larger;
         
            cursor: pointer; /* curseur de la souris */
        }

        .text-button:hover {
            background-color: #0056b3; /* couleur de fond au survol */
        }
nav {
    
    background-color:#aec6cf ;
}


ul { text-align: center;
    list-style-type: none;
    margin-left: 20%;
    padding: 0;
    overflow: hidden;
}

li {
    text-align: center;
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 30px 31px;
    align-items: center;
    color: #333;
    /* Text color */
    font-family: 'Poppins', sans-serif;
    font-size: larger;
    font-weight: 400;
    text-align: center;
    justify-content: space-between;
}

li a:hover {
    background-color:darkslategray;
}
input{
    
    /* Frame 10 */

    /* Auto layout */
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    padding: 13.0469px 25.0902px;
    gap: 10.04px;
    margin-top: 10px;
    width: 163.18px;
    height: 64px;
    margin-left: 5px;
    color: #ffffff;
    background: #333;
    border-radius: 10.0361px;

}</style>
 

<script>
    function allerPage2() {
        window.location.href = "page2.php";
    }
    function allerPage1() {
        window.location.href = "page1.php";
    }
    function allerPage3() {
        window.location.href = "page3.php";
    }
</script>



   
   
    <div id="layer1" >
  <form  method="GET" >
	<input type="submit" name="Submit1" value="ON" />

    
  </form>
</div>


<div id="layer2" >
 <form  method="GET" >
   <input type="submit" name="Submit2" value="OFF" />
  </form>

</div>
<div id="layer3">
  <form  method="GET" >

	<input type="submit" name="Submit3" value="Activer" />
    
  </form>
</div>


<div id="layer4" >
 <form  method="GET" >
   
   <input type="submit" name="Submit4" value="Desactiver" />
  </form>

</div>

<?php 


$con=mysqli_connect("localhost","root","","firebase");

{
    $res = false; // Initialisation de la variable de résultat

    // Exécution de la requête SQL
    if (isset($_GET['Submit1'])) {
        $res = mysqli_query($con, "insert into action ( Action1 )values ('1')");
    } elseif (isset($_GET['Submit2'])) {
        $res = mysqli_query($con, " insert into action ( Action1 )values ('0')");
    }}
    
//     // Vérification du résultat de la requête
//     if ($res === false) {
//         // Affichage de l'erreur en cas d'échec de la requête
//         echo "Erreur SQL : " . mysqli_error($con);
//     } else {
//         echo "Requête SQL exécutée avec succès.";
//     }
// }
// elseif (isset($_GET['Submit2']))
// $res=mysqli_query($con,"update action set Action1='0'");
// } 

{
if (isset($_GET['Submit3']))
$res=mysqli_query($con,"insert into action  (Action2) values ('1')");
 
elseif (isset($_GET['Submit4']))
$res=mysqli_query($con,"insert into action  (Action2) values ('0')");
}
?> 
</form>
</div>

</body>
</html>