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
                                        echo "<td style='width: 150px;'>".$row["telefon"]. "</td>";
                                        echo "<td style='width: 200px;'>"                                                                            
                                                ."<button type='button' class='btn btn-default btn-sm' style='background-color: #4f72d0;' ><span class='glyphicon glyphicon-edit' style='color: yellow;'></span><a data-toggle='modal' data-target='#myModal' href='edit.php?id=25'>Edit</a></button>"                                                                                    
                                                ."<button type='button' class='btn btn-default btn-sm' style='background-color: #3e5ae3;' ><span class='glyphicon glyphicon-remove' style='color: #ff4c4c;'></span><a href=\"delete.php?id=".$row['id']."\">Delete</a></button>"                                                                             
                                            ."</td>";
                                    
                                    echo "</tr>";
                                    
                                }
                            } else {
                                echo "0 results";
                            }
                            $conn->close();
                        ?>

                </tbody>
            </table>
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit Data</h4>
                        </div>
                        <div class="modal-body">
                            <div class="fetched-data">
                               <?php include 'edit.php';?>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="submiti">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
           <a href="insert_vlasnik.php" class="btn btn-primary">Dodaj</a>
                
       </div>
       <script>
            $(document).ready(function(){
                $('#myModal').on('show.bs.modal', function (e) {
                    var rowid = $(e.relatedTarget).data('id');
                    $.ajax({
                        type : 'post',
                        url : 'fetch_record.php', //Here you will fetch records 
                        data :  'rowid='+ rowid, //Pass $id
                        success : function(data){
                            $('.fetched-data').html(data);//Show fetched data from database
                        }
                    });
                });
            });
            
            
}
       </script>
    </body>
</html>
