<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>TP2 Formulaire</title>
    </head>
    <body>
        Tous les champs sont obligatoires <br /><br />
        <form method="POST" action="submit.php">
            Prénom <input type="text" name="prenom"/><br />
            Nom <input type="text" name="nom"/><br />
            Age <input type="age" name="age"/><br />
            Mot de passe <input type="password" name="mdp"/><br />
            Téléphone <input type="tel" name="tel"/><br />
            E-mail <input type="email" name="email"/><br />
            Quelle(s) ville(s) préferez-vous ? 
            <input type="checkbox" name="option[]" value="Paris" checked="checked"> Paris
            <input type="checkbox" name="option[]" value="Marseille"> Marseille
            <input type="checkbox" name="option[]" value="Lyon"> Lyon<br />
            
            Quel sport préferez-vous ?
            <input type="radio" name="group1" value="Football" checked="checked"> Football
            <input type="radio" name="group1" value="Rugby" > Rugby
            <input type="radio" name="group1" value="Handball"> Handball <br />
            
            Pays <select multiple name='pays[]'>
                <?php 
                $pays = array("France" => "France", "Allemagne" => "Allemagne", "Espagne" => "Espagne", "Angleterre" => "Angleterre");
                foreach ($pays as $keys => $value) {
                 echo "<option value='".$keys."'>".$value."</option>";
                                          } ?>
            </select><br /><br />
            Description <br />
            <textarea name="description" rows="5" cols="40" placeholder="Veuillez entrez une description"></textarea><br />

            
            
            <input type="submit" name="submit" value="S'enregistrer"/><input type='reset' name='reset' value='Remettre à zero'/>
            
        </form>
    </body>
</html>