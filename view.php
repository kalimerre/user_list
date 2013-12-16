<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
         <style type="text/css">
             th {
                 background-color: #D0E3FA;
             }
             
             
             
         </style>
    </head>
    <body>
        <table border="3">
            <th>Nom</th>
            <th>Prénom</th>
            <th>Date inserted</th>
            <th>Date updated</th>
            <th>Password</th>
            <th>Age</th>
            <th>Téléphone</th>
            <th>Email</th>
            <th>Description</th>
            <th>Ville</th>
            <th>Sport</th>
            <th>Pays</th>
            <th>Action</th>
        <?php
                try {
            $bdd = new PDO('mysql:host=localhost;dbname=maxime', 'maxime', 'maxime');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        
        
        $req = $bdd->prepare("SELECT * from user");
        $req->execute() or die(print_r($req->errorInfo()));
        $donnees = $req->fetchAll();
        $i = 0;
       foreach($donnees as $row)
        {
           
            echo "<tr bgcolor='".( ($i++ % 2 == 0) ? '#dddddd' : '#eeeeee' )."'>";
            echo "<td>".$row['nom']."</td>";
            echo "<td>".$row['prenom']."</td>";
            echo "<td>".$row['date_inserted']."</td>";
            echo "<td>".$row['date_updated']."</td>";
            echo "<td>".$row['password']."</td>";
            echo "<td>".$row['age']."</td>";
            echo "<td>".$row['telephone']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td>".$row['description']."</td>";
            echo "<td>";
            echo implode(",", json_decode($row['ville']));
            echo "</td>";
            echo "<td>".$row['sport']."</td>";
            echo "<td>";
            echo implode(",", json_decode($row['pays']));
            echo "</td>"; ?>
            <td><a href="edit.php?edit_id=<?php echo $row['idUser'];?>">Edit</a>&nbsp;&nbsp;<a href="delete.php?delete_id=<?php echo $row['idUser'];?>" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette entrée?'));">Supprimer</a></td>
           <?php echo "</tr>";
         
        }
        
        ?>
        </table>
    </body>
</html>
