<?php

$connection = new mysqli("localhost", "root", "", "phonestore");

$ID = "";
$Model ="";
$Price ="";
$Buyers_name ="";
$Buyers_phone ="";

$errorMessage="";
$SuccessMessage="";



if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    //GET: for showing clients data
    
    if(isset($_GET["ID"])) {
        header("location: index.php");
        exit;
    }
    $ID = $_GET["id"];

    // Query for reading Data
    $sql = "SELECT * FROM itempurchase WHERE id=$ID";
    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if(!$row) {
        header("locaiton: index.php");
    }
    $Model = $row["Model"];
    $Price = $row["Price"];
    $Buyers_name = $row["Buyers_name"];
    $Buyers_phone = $row["Buyers_phone"];

}
else{
    //POST: for updating data
  $ID = $_POST["ID"];
  $Model = $_POST["Model"];
  $Price = $_POST["Price"];
  $Buyers_name = $_POST["Buyers_name"];
  $Buyers_phone = $_POST["Buyers_phone"];
  do {
    if(empty($Model) || empty($Price) || empty($Buyers_name) || empty($Buyers_phone)){
        $errorMessage ="All the fireld must be filled";
        break;
    }
        $sql = "UPDATE itempurchase " .
        "SET Model = '$Model', Price = '$Price', Buyers_name = '$Buyers_name', Buyers_phone = '$Buyers_phone' " .
        "WHERE ID = $ID";


        $result = $connection->query($sql);
        
        if(!$result) {
            $errorMessage = "Wrong Query" . $connection->error;
            break;
        }

        $SuccessMessage = "Successfull";
        header("location: index.php");
        exit;



     } while(false);


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
        <h2> New Purchase </h2>
        
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
            <input type="hidden" name = "ID" value="<?php echo $ID ?>">
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