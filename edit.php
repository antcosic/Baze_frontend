<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->



<html>
    <head>
        <meta charset="UTF-8">
        
        <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/superhero/bootstrap.min.css" rel="stylesheet" integrity="sha384-Xqcy5ttufkC3rBa8EdiAyA1VgOGrmel2Y+wxm4K3kI3fcjTWlDWrlnxyD6hOi3PF" crossorigin="anonymous">
  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
        <title></title>
        <style>
           
            h1{
                text-align: center;
            }
            
            a {
                text-decoration: none !important;
            }
        </style>
    </head>
    <body>
       <div class="container">


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "baza";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


   $id=$_GET['id']; 
    /*$id="";
        
    if(!isset($_COOKIE[$novi_id])) {
    echo "Cookie named '" . $novi_id . "' is not set!";
} else {
    echo "Cookie '" . $novi_id . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$novi_id];
    $id=$novi_id;
}*/
//echo $id;
    // sql to delete a record
    $sql = "SELECT * FROM vlasnik WHERE id='".$id."'";
     
    //$sql = "SELECT * FROM vlasnik WHERE id=25";
    
    $result1 = $conn->query($sql);

    
    if ($result1->num_rows > 0) {
        
        while($row = $result1->fetch_assoc()) {
           
            echo "<form action='edit.php?id='".$row['id']."'' method='post' class='form-horizontal'>
                    <fieldset>
                        <p></p>
                      
                      <p style='text-align: center; font-size: 20px;'>Update vlasnika</p>
                      <hr>
                      <div class='form-group'>
                        <label for='inputid' class='col-lg-2 control-label'>Id</label>
                        <div class='col-lg-8'>
                          <input type='text' class='form-control' name='inputId' placeholder='".$row['id']."' value='".$row['id']."'>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputIme' class='col-lg-2 control-label'>Ime</label>
                        <div class='col-lg-8'>
                          <input type='text' class='form-control' name='inputIme' placeholder='".$row['ime']."' value='".$row['ime']."'>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputPrezime' class='col-lg-2 control-label'>Prezime</label>
                        <div class='col-lg-8'>
                          <input type='text' class='form-control' name='inputPrezime' placeholder='".$row['prezime']."' value='".$row['prezime']."'>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputAdresa' class='col-lg-2 control-label'>Adresa</label>
                        <div class='col-lg-8'>
                          <input type='text' class='form-control' name='inputAdresa' placeholder='".$row['adresa']."' value='".$row['adresa']."'>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputEmail' class='col-lg-2 control-label'>Email</label>
                        <div class='col-lg-8'>
                          <input type='text' class='form-control' name='inputEmail' placeholder='".$row['email']."' value='".$row['email']."'>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputTelefon' class='col-lg-2 control-label'>Telefon</label>
                        <div class='col-lg-8'>
                          <input type='text' class='form-control' name='inputTelefon' placeholder='".$row['telefon']."' value='".$row['telefon']."'>
                        </div>
                      </div>
                      
                      <div class='form-group'>
                        <div class='col-lg-10 col-lg-offset-2'>
                          <button type='submit' class='btn btn-primary' id='submiti' name='submiti'>Submit</button>
                        </div>
                      </div>
                    </fieldset>
                </form>";
        } 
    }
                    $result="";
                   
                    setcookie("id", $id, time() + (86400 * 30), "/");
                    $novi_id=$id;
                    
                    
                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["submiti"])) {
                       
                        $novi_id=$_COOKIE["id"];
                        //echo "novi id"+$novi_id;
                        $ID = $_POST['inputId'];
                        $ime = $_POST['inputIme'];
                        $prezime = $_POST['inputPrezime'];
                        $adresa = $_POST['inputAdresa'];
                        $email = $_POST['inputEmail'];
                        $telefon = $_POST['inputTelefon'];

                              
                        $sql = "UPDATE vlasnik 
                                SET id = '$ID', ime= '$ime', prezime = '$prezime', adresa = '$adresa', email = '$email', telefon='$telefon'
                                WHERE id ='".$novi_id."'";

                        if ($conn->query($sql) === TRUE) {
                            $result = "<div class='alert alert-dismissible alert-success'>
                                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                            <strong>Uspjesno ste promijenili podatke vlasnika!</strong>
                                            <a href='vlasnici.php' class='alert-link'>Idi na popis vlasnika</a>
                                        </div>";
                            echo $result;
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }

                    }
    
    if ($result1 == TRUE) {
        echo "<div class='row'><div class='col-sm-10'></div><div class='col-sm-2'><button type='button' class='btn btn-default' style='background-color: #4f72d0; color: white;' data-dismiss='modal'><a href='vlasnici.php'>Cancel</a></button></div></div> ";
        //header('Location: vlasnici.php');
    } else {
        echo "Error deleting record: " . $conn->error;
    }

$conn->close();

?>

           
           </div>
    </body>
</html>