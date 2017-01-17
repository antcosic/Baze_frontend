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
  
        <title></title>
        <style>       
            h1{
                text-align: center;
            }
        </style>
    </head>
    <body>
        
       <h1> Popis vlasnika pasa</h1>
       
       
       <div class="container-fluid">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>

                    <th>ID</th>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>Adresa</th>
                    <th>Email</th>
                    <th>Telefon</th>

                    </tr>
                </thead>
                <tbody>

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

                            $sql = "SELECT * FROM vlasnik";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr style='text-align: left;'>";
                                        echo "<td >".$row["id"]. "</td>";
                                        echo "<td>".$row["ime"]. "</td>";
                                        echo "<td>".$row["prezime"]. "</td>";
                                        echo "<td>".$row["adresa"]. "</td>";
                                        echo "<td>".$row["email"]. "</td>";
                                        echo "<td>".$row["telefon"]. "</td>";
                                        echo "<td><a href='#'><span class='glyphicon glyphicon-edit'></span></a>   "
                                                ."<a href='#'><span class='glyphicon glyphicon-remove'></span></a>"
                                                . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "0 results";
                            }
                            $conn->close();
                        ?>

                </tbody>
            </table>
           
           <a href="insert_vlasnik.php" class="btn btn-primary">Dodaj</a>
                
       </div>
    </body>
</html>
