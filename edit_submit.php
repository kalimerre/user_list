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
            echo "<br /> Redirection automatique dans 2 secondes";
            ?>
            <SCRIPT LANGUAGE="JavaScript">
                window.setTimeout('history.back();', 2000); // waits 2 seconds before going back
            </SCRIPT>

            <?php
        } else {
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

            //$_POST['updated'] = date('Y-m-d H:i:s');
            //unset($_POST['pays']);
            unset($_POST['submit']);
            //unset($_POST['option']);
            //var_dump($_POST);
            $req = $bdd->prepare("UPDATE user 
                             SET 
                             nom = :nom, 
                             prenom = :prenom, 
                             date_updated = :updated, 
                             password = :mdp, 
                             age = :age, 
                             telephone = :tel, 
                             email = :email, 
                             description = :description,
                             sport = :group1,
                             ville = :option,
                             pays = :pays
                             WHERE idUser = :iduser  ");
            $list_update = array(
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'updated' => date('Y-m-d H:i:s'),
                'mdp' => $_POST['mdp'],
                'age' => $_POST['age'],
                'tel' => $_POST['tel'],
                'email' => $_POST['email'],
                'description' => $_POST['description'],
                'group1' => $_POST['group1'],
                'option' => $_POST['option'],
                'pays' => $_POST['pays'],
                'iduser' => $_POST['idUser']
            );
            $req->execute($list_update) or die(print_r($req->errorInfo()));
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
