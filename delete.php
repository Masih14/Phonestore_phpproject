<?php
 if (isset($_GET["id"])) {
$ID = $_GET["id"];
    $connection = new mysqli("localhost", "root", "", "phonestore");
    $sql = "DELETE FROM itempurchase WHERE ID = $ID";
    $connection -> query ($sql);
    }
    
    header('location:index.php');
    exit;
?>