

<?php
include_once "../../../../Controller/adminC.php";
include_once "../../../../Model/admin.php";

$adminC=new adminC();

if(isset($_POST['supprimer'])){
   
   $adminC->supprimeradmin($_POST['idA']);
   header('location: consulteradmin.php');
 } 
 ?>