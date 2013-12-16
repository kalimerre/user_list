<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>TP2 - Formulaire - Validation</title>
    </head>
    <body>
        <?php
        

        $message = "";

        
        if (isset($_POST['nom'])) {
            if (empty($_POST['nom'])) {
                $message = "Le champs nom n'a pas été rempli. <br />";
            }
        }
        if (isset($_POST['prenom'])) {
            if (empty($_POST['prenom'])) {
                $message .= "Le champs prenom n'a pas été rempli. <br />";
            }
        }
        if (isset($_POST['mdp'])) {
            if (empty($_POST['mdp'])) {
                $message .= "Le champs mot de passe n'a pas été rempli. <br />";
            }
        }
        if (isset($_POST['tel'])) {
            if (empty($_POST['tel'])) {
                $message .= "Le champs tel n'a pas été rempli. <br />";
            }
        }
        if (isset($_POST['email'])) {
            if (empty($_POST['email'])) {
                $message .= "Le champs email n'a pas été rempli. <br />";
            }
        }
        if (!isset($_POST['pays'])) {

            $message .= "Le champs pays n'a pas été rempli. <br />";
        }
        if (isset($_POST['description'])) {
            if (empty($_POST['description'])) {
                $message .= "Le champs description n'a pas été rempli. <br />";
            }
        }
        if (!isset($_POST['option'])) {

            $message .= "Le champs quelle ville preferez-vous n'a pas été rempli. <br />";
        }
        if (isset($_POST['group1'])) {
            if (empty($_POST['group1'])) {
                $message .= "Le champs quel sport préférez vous n'a pas été rempli. <br />";
            }
        }

        if ($message != "") {
            echo $message;
        } else {
//            $pays = $_POST['pays'];
//            $choix = $_POST['option'];
//            echo "Enregistrement réussi <br /><br />";
//            echo "Votre nom est : " . $_POST['nom'] . "<br />";
//            echo "Votre prénom est : " . $_POST['prenom'] . "<br />";
//            echo "Votre mot de passe est : " . $_POST['mdp'] . "<br />";
//            echo "Votre téléphone est : " . $_POST['tel'] . "<br />";
//            echo "Votre email est : " . $_POST['email'] . "<br />";
//            echo "Votre pays est : ";
//            foreach ($pays as $selectValue) {
//                echo $selectValue . " ";
//            }
//            echo "<br />";
//            echo "Votre(vos) ville(s) préférée(s) est(sont) : ";
//            foreach ($_POST['option'] as $chkbx) {
//
//                echo $chkbx . " ";
//            }
//            echo "<br />";
//
//            echo "Votre sport préféré est  : " . $_POST['group1'] . "<br />";
//            echo "Votre description est : " . $_POST['description'] . "<br />";
                    try {
            $bdd = new PDO('mysql:host=localhost;dbname=maxime', 'maxime', 'maxime');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        

        
//        $response = $bdd->query("SELECT * from user") or die(print_r($bdd-errorInfo()));
//        echo "<pre>";
//        print_r($response->fetchAll(PDO::FETCH_ASSOC));
//        echo "</pre>";
        
        $_POST['option'] = json_encode($_POST['option']);
        $_POST['pays'] = json_encode($_POST['pays']);
        json_encode($_POST['pays']);
        $_POST['inserted'] = date('Y-m-d H:i:s');
        $_POST['updated'] = date('Y-m-d H:i:s');
        //unset($_POST['pays']);
        unset($_POST['submit']);
        //unset($_POST['option']);
        //var_dump($_POST);
        $req = $bdd->prepare("INSERT INTO user (nom, prenom, date_inserted, date_updated, password, age, telephone, email, description, sport, ville, pays)
                             VALUES (:nom, 
                             :prenom, 
                             :inserted,
                             :updated, 
                             :mdp, 
                             :age, 
                             :tel, 
                             :email, 
                             :description,
                             :group1,
                             :option,
                             :pays)  ");
        
        $req->execute($_POST) or die(print_r($req->errorInfo()));

//        echo "<pre>";
//        print_r($req->fetchAll(PDO::FETCH_ASSOC));
//        echo "</pre>"; 
//        echo "<pre>";
//        while($data = $req->fetchAll(PDO::FETCH_ASSOC))
//        {
//            print_r($data);
//        }
//        $req->closeCursor();
//        echo "</pre>"; 
?>
                <script type="text/javascript">
        <!--
        window.location = "http://localhost/TP2/view.php"
        //-->
        </script>
        
        
        <?php
        }
        ?>
    </body>
</html>
