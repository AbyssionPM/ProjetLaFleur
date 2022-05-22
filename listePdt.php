<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/rose.css">
  </head>
  <body>
    <table border="1" style="width: 40%">

    <?php
      $user = "root" ;        //Accès à la BDD avec les ID et MdP du serveur PHPMyAdmin
      $pwd = "j3cPTLa@eNb" ;
      try                               // TRY permet la gestion des exceptions et a une écriture particulière
      {
        $dbh = new PDO('mysql:host=localhost;dbname=base_lafleur_1',$user,$pwd) ; // Connexion à la BDD
        $request = "select * from produit where pdt_categorie='".$_GET["produit"]."';" ; // $request prend pour valeur la requête SQL,
                                                                                          // $GET_["produit"] est utilisé dans menu.php pour rediriger en f(x)
                                                                                          // de la catégorie (voir menu.php)


        foreach($dbh->query($request) as $row)                      // Boucle parcourant le tableau récupéré dans la BDD ou TAB = $dbh->query($request),
                                                                    // $row est une variable locale qui représente les informations parcourues dans le tableau
        {
          echo "<tr>";                                                  // Affichage
          echo "<td> <img src=img/".$row["pdt_image"].".jpg></td>";     // Petite subtilité : on doit déclarer la balise image et indiquer le dossier pour l'affichage
          echo "<td>".$row["pdt_ref"]."</td>";
          echo "<td>".$row["pdt_designation"]."</td>";
          echo "<td>".$row["pdt_prix"]."</td>";
          echo "</tr>";
        }
        $dbh = NULL ;         // Fermeture de la connexion en mettant la valeur de $dbh à NULL
      }
      catch (PDOException $e)       //En cas d'erreur (mauvais mdp, mauvais user, mauvaise requète..) affiche le message "Erreur"
      {
        print "Erreur: ".$e->getMessage() . "<br/>" ;
        die();
      }
     ?>
     </table>
  </body>
</html>
