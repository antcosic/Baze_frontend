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


    
    
        
    

//echo $id;
    // sql to delete a record
    $sql = "SELECT * FROM vlasnik WHERE id=25";
    
    $result1 = $conn->query($sql);

    
    if ($result1->num_rows > 0) {
        while($row = $result1->fetch_assoc()) {
            echo "<form action='edit.php' method='post' class='form-horizontal'>
                    <fieldset>
                        <p></p>
                      
                      <p style='text-align: center; font-size: 20px;'>Update vlasnika</p>
                      <hr>
                      <div class='form-group'>
                        <label for='inputid' class='col-lg-2 control-label'>Id</label>
                        <div class='col-lg-8'>
                          <input type='text' class='form-control' name='inputId' placeholder='".$row['id']."'>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputIme' class='col-lg-2 control-label'>Ime</label>
                        <div class='col-lg-8'>
                          <input type='text' class='form-control' name='inputIme' placeholder='".$row['ime']."'>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputPrezime' class='col-lg-2 control-label'>Prezime</label>
                        <div class='col-lg-8'>
                          <input type='text' class='form-control' name='inputPrezime' placeholder='".$row['prezime']."'>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputAdresa' class='col-lg-2 control-label'>Adresa</label>
                        <div class='col-lg-8'>
                          <input type='text' class='form-control' name='inputAdresa' placeholder='".$row['adresa']."'>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputEmail' class='col-lg-2 control-label'>Email</label>
                        <div class='col-lg-8'>
                          <input type='text' class='form-control' name='inputEmail' placeholder='".$row['email']."'>
                        </div>
                      </div>
                      <div class='form-group'>
                        <label for='inputTelefon' class='col-lg-2 control-label'>Telefon</label>
                        <div class='col-lg-8'>
                          <input type='text' class='form-control' name='inputTelefon' placeholder='".$row['telefon']."'>
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

                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["submiti"])) {
                       
                        //$novi_id=$id;
                        $ID = $_POST['inputId'];
                        $ime = $_POST['inputIme'];
                        $prezime = $_POST['inputPrezime'];
                        $adresa = $_POST['inputAdresa'];
                        $email = $_POST['inputEmail'];
                        $telefon = $_POST['inputTelefon'];

                                
                        $sql = "UPDATE vlasnik 
                                SET id = '$ID', ime= '$ime', prezime = '$prezime', adresa = '$adresa', email = '$email', telefon='$telefon'
                                WHERE id = 25";

                        if ($conn->query($sql) === TRUE) {
                            $result = "<div class='alert alert-dismissible alert-success'>
                                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                            <strong>Uspjesno ste dodali novog vlasnika!</strong>
                                            <a href='vlasnici.php' class='alert-link'>Idi na popis vlasnika</a>
                                        </div>";
                            echo $result;
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }

                    }
    
    if ($result1 == TRUE) {
        echo "<div class='row'><div class='col-sm-10'></div><div class='col-sm-2'><button type='button' class='btn btn-default' style='background-color: #4f72d0;' data-dismiss='modal'>Close</button></div></div> ";
        //header('Location: vlasnici.php');
    } else {
        echo "Error deleting record: " . $conn->error;
    }

$conn->close();

?>
