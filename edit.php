<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if (isset($_GET['edit_id']) && is_numeric($_GET['edit_id'])) {
             try {
                $bdd = new PDO('mysql:host=localhost;dbname=maxime', 'maxime', 'maxime');
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }


            $req = $bdd->prepare("SELECT * from user WHERE idUser = '".$_GET['edit_id']."'");
            $req->execute() or die(print_r($req->errorInfo()));
            $donnees = $req->fetchAll();
       foreach($donnees as $row)
        {
            
            
            ?>
                <form method="POST" action="edit_submit.php">
            Prénom <input type="text" name="prenom" value="<?php echo $row['prenom'];?>"/><br />
            Nom <input type="text" name="nom" value="<?php echo $row['nom'];?>"/><br />
            Age <input type="age" name="age" value="<?php echo $row['age'];?>"/><br />
            Mot de passe <input type="password" name="mdp"/><br />
            Téléphone <input type="tel" name="tel" value="<?php echo $row['telephone'];?>"/><br />
            E-mail <input type="email" name="email" value="<?php echo $row['email'];?>"/><br />           
            Quelle(s) ville(s) préferez-vous ? 
            <input type="checkbox" name="option[]" value="Paris" <?php if (in_array("Paris", json_decode($row['ville']))) echo "checked='checked'";?>> Paris
            <input type="checkbox" name="option[]" value="Marseille" <?php if (in_array("Marseille", json_decode($row['ville']))) echo "checked='checked'";?>> Marseille
            <input type="checkbox" name="option[]" value="Lyon" <?php if (in_array("Lyon", json_decode($row['ville']))) echo "checked='checked'";?>> Lyon<br />
            
            Quel sport préferez-vous ?
            <input type="radio" name="group1" value="Football" <?php if ($row['sport'] == "Football") echo "checked='checked'";?>> Football
            <input type="radio" name="group1" value="Rugby" <?php if ($row['sport'] == "Rugby") echo "checked='checked'";?>> Rugby
            <input type="radio" name="group1" value="Handball" <?php if ($row['sport'] == "Handball") echo "checked='checked'";?>> Handball <br />
            
            Pays <select multiple name='pays[]'>
                <?php 
                $pays = array("France" => "France", "Allemagne" => "Allemagne", "Espagne" => "Espagne", "Angleterre" => "Angleterre");
                foreach ($pays as $keys => $value) {
                    if (in_array($value, json_decode($row['pays']))) 
                            $chk = "selected='selected'";
                    else
                            $chk = "";
                 echo "<option value='".$keys."' ".$chk.">".$value."</option>";
                                          } ?>
            </select><br /><br />
            Description <br />
            <textarea name="description" rows="5" cols="40" placeholder="Veuillez entrez une description" ><?php echo $row['description'];?></textarea><br />

            
            <input type="hidden" name="idUser" value="<?php echo $_GET['edit_id'];?>" />
            <input type="submit" name="submit" value="Mettre à jour"/><input type='reset' name='reset' value='Remettre à zero'/>

        
        
        
        
        <?php
        
        }    
            
        }
        ?>
    </body>
</html>
