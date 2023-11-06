<?php

$connection = new mysqli("localhost", "root", "", "phonestore");


$Model ="";
$Price ="";
$Buyers_name ="";
$Buyers_phone ="";
$errorMessage="";
$SuccessMessage="";

if( $_SERVER['REQUEST_METHOD'] == 'POST'){
  $Model = $_POST["Model"];
  $Price = $_POST["Price"];
  $Buyers_name = $_POST["Buyers_name"];
  $Buyers_phone = $_POST["Buyers_phone"];


do {
    if(empty($Model) || empty($Price) || empty($Buyers_name) || empty($Buyers_phone)){
        $errorMessage ="All the fireld must be filled";
        break;
    }
// For adding a new purchase into the database
$sql = "INSERT INTO itempurchase (Model, Price, Buyers_name, Buyers_phone) " 
."VALUES ('$Model', $Price, '$Buyers_name', $Buyers_phone)";
$result = $connection->query($sql);

if(!$result) {
    $errorMessage = "Invalid Query: " .$connection->error;
    break;
}

$Model ="";
$Price ="";
$Buyers_name ="";
$Buyers_phone ="";
$errorMessage="";

$SuccessMessage="Added Successfully";

header("location: index.php");
exit;

    }
     while (false);


}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phone Store</title>
    <link rel="stylesheet" type="text/css" href="style2.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2 class="h2color"> New Purchase </h2>
        <br>
        <br>
        <br>
        <?php
        if(!empty($errorMessage)){
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>$errorMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
            </div>
            ";
        }

        ?>
        
        
        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-from-label"> Model </label>
                <div class="col-sm-6">
                    <input type="text" class="from-control" name="Model" value="<?php echo $Model ?>">
                        </div>
                  </div>
          <div class="row mb-3">
                    <label class="col-sm-3 col-from-label"> Price </label>
                    <div class="col-sm-6">
                    <input type="Number" class="from-control" name="Price" value="<?php echo $Price ?>">
                    </div>
                </div>
          <div class="row mb-3">
                <label class="col-sm-3 col-from-label"> Buyers Name </label>
                <div class="col-sm-6">
                    <input type="Text" class="from-control" name="Buyers_name" value="<?php echo $Buyers_name ?>">
                    </div>
                 </div>         
          <div class="row mb-3">
                <label class="col-sm-3 col-from-label"> Buyers Phone </label>
                <div class="col-sm-6">
                    <input type="Number" class="from-control" name="Buyers_phone" value="<?php echo $Buyers_phone ?>">
                    </div>
                </div>
 
                <?php
        if(!empty($SuccessMessage)){
            echo "
            <div class='row mb-3'>
            <div class='offset-sm-3 col-sm-6>
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>$$SuccessMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
            </div>
            ";
        }

        ?>        
         
       <div class="row mb-3">
               <div class="offset-sm-3 col-sm-3 d-grid">
                <button type="submit" class="btn btn-primary"> Submit </button>
          </div>
          <div class="col-sm-3 d-grid">
            <a class="btn btn-outline-primary" href="index.php" role="button"> Cancel </a>
          </div>
</div>


        </form>
 </body>
</html>