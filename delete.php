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
        if (isset($_GET['delete_id']) && is_numeric($_GET['delete_id'])) {
            try {
                $bdd = new PDO('mysql:host=localhost;dbname=maxime', 'maxime', 'maxime');
            } catch (Exception $e) {
                die('Erreur : ' . $e->getMessage());
            }


            $req = $bdd->prepare("DELETE from user WHERE idUser = '".$_GET['delete_id']."'");
            $req->execute() or die(print_r($req->errorInfo()));?>
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
