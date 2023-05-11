

<?php
include_once "../../../../Controller/clientC.php";
include_once "../../../../Model/client.php";

$clientC=new clientC();

if(isset($_POST['supprimer'])){
   
   $clientC->supprimerClient($_POST['idC']);
   header('location: consulterclient.php');
 } 
 ?>