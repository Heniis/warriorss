<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="body">
                            <a class="btn btn-dark" href="consulterAdmin.php">Consulter Admin </a>
                                        
                                    </div>
                                    </div>
    
</body>
</html>
<?php

    
    include_once "../../../../Controller/adminC.php";
    include_once "../../../../Model/admin.php";
   
    function pdo_connect_mysql() {
        $DATABASE_HOST = 'localhost';
        $DATABASE_USER = 'root';
        $DATABASE_PASS = '';
        $DATABASE_NAME = 'ventebd';
        try {
            return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
        } catch (PDOException $exception) {
            // If there is an error with the connection, stop the script and display the error.
            exit('Failed to connect to database!');
        }
    }
    $msg = '';   
    $pdo = pdo_connect_mysql();
    // Check if the admin idA exists, for example update.php?idA=1 will get the admin with the idA of 1
   
        if (!empty($_POST)) {
            $idA = isset($_POST['idA']) && !empty($_POST['idA']) && $_POST['idA'] != 'auto' ? $_POST['idA'] : NULL;
            $nomUser = isset($_POST['nomUser']) ? $_POST['nomUser'] : '';
            $prenomUser = isset($_POST['prenomUser']) ? $_POST['prenomUser'] : '';
            $addresse = isset($_POST['addresse']) ? $_POST['addresse'] : '';
            
            $mail = isset($_POST['mail']) ? $_POST['mail'] : '';
            $status = isset($_POST['status']) ? $_POST['status'] : '';

            
            $stmt = $pdo->prepare('INSERT INTO admin VALUES ( ?,?,?,?,?,?)');
            $stmt->execute([$idA, $nomUser, $prenomUser, $addresse,  $mail, $status]);
            // Output messaddresse
            $msg = 'Created Successfully!';
        }


    
?>


                                   
 