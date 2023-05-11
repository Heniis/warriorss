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
    // Check if the client id exists, for example update.php?id=1 will get the client with the id of 1
    if (isset($_GET['idA'])) {
        if (!empty($_POST)) {
            // This part is similar to the create.php, but instead we update a record and not insert
          //  $id = isset($_POST['id']) ? $_POST['id'] : NULL;
            $nomUser = isset($_POST['nomUser']) ? $_POST['nomUser'] : '';
            $prenomUser = isset($_POST['prenomUser']) ? $_POST['prenomUser'] : '';
            $addresse = isset($_POST['addresse']) ? $_POST['addresse'] : '';
            $mail = isset($_POST['mail']) ? $_POST['mail'] : '';
            $status = isset($_POST['status']) ? $_POST['status'] : '';
            // Update the record
            $stmt = $pdo->prepare('UPDATE admin SET  nomUser = ?, prenomUser = ?, addresse = ?,  mail = ?, status = ? WHERE idA = ?');
            $stmt->execute([ $nomUser, $prenomUser, $addresse,$mail,$status, $_GET['idA']]);
            $msg = 'Updated Successfully!';
        }
        // Get the admin from the admins table
     $stmt = $pdo->prepare('SELECT * FROM admin WHERE idA = ?');
       $stmt->execute([$_GET['idA']]);
      $admin = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$admin) {
           exit('admin doesn\'t exist with that idA!');
        }
    } 
    else {
        exit('No id specified!');
    }
    
    $statusMessage = '';
if ( isset($_POST['captchaText']) && ($_POST['captchaText']!="")){
	if(strcasecmp($_SESSION['captchaCode'], $_POST['captchaText']) != 0){
		$statusMessage = "It seems you have entered invalid captcha code! Please try again.";
	}else{
		$statusMessage = "Your captcha code have been matched successfully."; 
	}
} else {
	$statusMessage = "Enter captcha code."; 
}
?>