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
        <button type='button' class='btn btn-default btn-sm' href='home.php'>
            <span class='glyphicon glyphicon-home'></span> <a href='home.php'> Home </a>
        </button>
       <h1> Popis skupina za pasmine</h1>
       
       
       <div class="container-fluid">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>

                    <th>ID</th>
                    <th>Naziv</th>
                    
                   

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

                            
                            $sql = "SELECT id, naziv FROM skupina";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // output data of each row
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr style='text-align: left;'>";
                                        echo "<td >".$row["id"]. "</td>";
                                        echo "<td>".$row["naziv"]. "</td>";
                                        
                                        
                                        
                                    echo "</tr>";
                                    
                                }
                            } else {
                                echo "0 results";
                            }
                            $conn->close();
                        ?>

                </tbody>
            </table>
            
           
                
       </div>
       <script>
            
            
            
}
       </script>
    </body>
</html>

