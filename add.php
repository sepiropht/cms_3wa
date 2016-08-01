<?php
error_reporting(E_ALL);


if ($_FILES['inputFile']['error'] > 0) {
  $erreur = "Erreur lors du transfert";
  echo $erreur;
} else {

   copy($_FILES['inputFile']['tmp_name'], getcwd()."/images/".$_FILES['inputFile']['name']);

}
 echo $resultat;
if ($resultat) echo "Transfert réussi";





if(empty($_POST['name']) == false )
{
    echo 'yeah';
	// L'utilisateur a saisi un titre, on peut enregistrer la tâche.
    $titre = $_POST['name'];
    $description = $_POST['description'];
    $file = "images/".$_FILES['inputFile']['name'];
    $link = $_POST['link'];




        $conn = mysqli_connect('localhost', 'root', 'azerty', 'portofolio');
    // Check connection
    if (!$conn) {
       die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO portofolio (name, description, link, image) VALUES ( '$titre', '$description', '$link', '$file') ";

    if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);

    header('Location: index.php');
    exit;


}
