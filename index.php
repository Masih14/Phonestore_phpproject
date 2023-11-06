<!DOCTYPE html>
<html> 
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Sold Phones Record</title>
        <link rel="stylesheet" type="text/css" href="style2.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
       
    </head>

    <body class= "back">
        <div class="container  my-5">
            <h2 class="h2color"> List of phones </h2>
            <br>
            <br>
            <a class="btn btn-primary" href="create.php" role="button"> New Purchase Entry </a>
            <br>
            <table class="table">
            <thead>
               <tr>
                <th>ID</th>
                <th>Model</th>
                <th>Price</th>
                <th>Buyer's Name</th>
                <th>Buyer's Phone</th>
                <th>Action</th>
                </hr>   
            </thead>
            <tbody>
                
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "PhoneStore";
                 
                // My connection to the Database
                $connection = new mysqli($servername, $username, $password, $dbname);
                
                // This code is for checking if connection is successful or not
                if ($connection->connect_error) {
                    die("Not Connected: " .$connection->connect_error);
                }

                // Command for database
                $sql ="SELECT * FROM itempurchase";
                $result = $connection->query($sql);
                
                if(!$result) {
                    die("Incorrect Query" .$connection->connect_error);
                }
                // To read data for each row of the table 
                while( $row = $result->fetch_assoc() ) {
                echo "
                <tr>
                <td>$row[ID]</td>
                <td>$row[Model]</td>
                <td>$row[Price]</td>
                <td>$row[Buyers_name]</td>
                <td>$row[Buyers_phone]</td>
                <td>
                    <a class='btn btn-primary btn-sm' href='edit.php?id=$row[ID]'> Edit </a>
                    <a class='btn btn-primary btn-sm' href='delete.php?id=$row[ID]'> Delete </a>
                </td>
                </tr>
                ";
                }



                ?>

               
            </tbody>
            </table>
            </div>



    </body>

</html>