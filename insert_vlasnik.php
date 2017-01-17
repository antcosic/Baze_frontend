


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
            
        </style>
    </head>
    <body>
       <div class="container">
          
           <form action="insert_vlasnik.php" method="post" class="form-horizontal">
                    <fieldset>
                      <legend>Novi vlasnik</legend>
                      <div class="form-group">
                        <label for="inputIme" class="col-lg-2 control-label">Ime</label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" name="inputIme" placeholder="Ime">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputPrezime" class="col-lg-2 control-label">Prezime</label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" name="inputPrezime" placeholder="Prezime">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputAdresa" class="col-lg-2 control-label">Adresa</label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" name="inputAdresa" placeholder="Adresa">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" name="inputEmail" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputTelefon" class="col-lg-2 control-label">Telefon</label>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" name="inputTelefon" placeholder="Telefon">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                          <a href="vlasnici.php" class="btn btn-default">Cancel</a>
                          <button type="submit" class="btn btn-primary" id="submit" name="submit">Submit</button>
                        </div>
                      </div>
                    </fieldset>
                </form>
           <div class="row">
               <div class="col-lg-2"></div>
               <div class="col-lg-8">
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

                    $result="";

                    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["submit"])) {
                        $ime = $_POST['inputIme'];
                        $prezime = $_POST['inputPrezime'];
                        $adresa = $_POST['inputAdresa'];
                        $email = $_POST['inputEmail'];
                        $telefon = $_POST['inputTelefon'];


                        $sql = "INSERT INTO vlasnik (ime, prezime, adresa, email, telefon)
                                VALUES ('$ime', '$prezime', '$adresa', '$email', '$telefon')";

                        if ($conn->query($sql) === TRUE) {
                            $result = "<div class='alert alert-dismissible alert-success'>
                                            <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                            <strong>Uspjesno ste dodali novog vlasnika!</strong>
                                        </div>";
                            echo $result;
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }

                    }
                    $conn->close();
                ?>
           </div>

          
       </div>
           </div>
    </body>
</html>