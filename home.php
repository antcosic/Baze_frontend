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
            #loader {
                position: absolute;
                left: 50%;
                top: 50%;
                z-index: 1;
                width: 150px;
                height: 150px;
                margin: -75px 0 0 -75px;
                border: 16px solid #f3f3f3;
                border-radius: 50%;
                border-top: 16px solid #3498db;
                width: 120px;
                height: 120px;
                -webkit-animation: spin 2s linear infinite;
                animation: spin 2s linear infinite;
              }

              @-webkit-keyframes spin {
                0% { -webkit-transform: rotate(0deg); }
                100% { -webkit-transform: rotate(360deg); }
              }

              @keyframes spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
              }

              /* Add animation to "page content" */
              .animate-bottom {
                position: relative;
                -webkit-animation-name: animatebottom;
                -webkit-animation-duration: 1s;
                animation-name: animatebottom;
                animation-duration: 1s
              }

              @-webkit-keyframes animatebottom {
                from { bottom:-100px; opacity:0 } 
                to { bottom:0px; opacity:1 }
              }

              @keyframes animatebottom { 
                from{ bottom:-100px; opacity:0 } 
                to{ bottom:0; opacity:1 }
              }

              #myDiv {
                display: none;
                text-align: center;
              }
              #bgimg {
                    background-image: url('./pozadina.jpg');
                }
                img {
    max-width: 2000px;
    max-height: 719px;
   
}

.mydiv{
    
    position: fixed;
    top: 40px;
    bottom: 0px;
    left: 0px;
    right: 0px;
}

.text{
  
    position: absolute;
    top: 200px;
    bottom: 400px;
    left: 400px;
    right: 400px;
    
    
}

        </style>
    </head>
    <body onload="myFunction()">
        
        <div id="loader"></div>
        <div style="display:none; " id="myDiv" class="animate-bottom">
            
            
                
                    <nav class="navbar navbar-inverse">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                                  <span class="sr-only">Toggle navigation</span>
                                  <span class="icon-bar"></span>
                                  <span class="icon-bar"></span>
                                  <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="#">Naslovna</a>
                            </div>

                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                                <ul class="nav navbar-nav">
                                    <li class="active"><a href="http://www.cavaliers.com.hr/index.php/pravilnici-i-zakon-topmenu/pravilnici/pravilnik-o-izlozbama">Pravilnik <span class="sr-only">(current)</span></a></li>
                                    <li><a href="http://www.hks.hr/web/index.php">HKS</a></li>
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Menu<span class="caret"></span></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="vlasnici.php">Vlasnici</a></li>
                                            <li><a href="pasmine.php">Pasmine</a></li>
                                            <li class="divider"></li>
                                            <li><a href="skupine.php">Skupine</a></li>
                                          
                                        </ul>
                                    </li>
                                </ul>
                                <form class="navbar-form navbar-left" role="search">
                                    
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal" name="submit4">Prikaži pse</button>
                                </form>
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="index.php"><span class="glyphicon glyphicon-log-out" style="color: #2048b2"></span></a></li>
                                </ul>
                                
  
                            </div>
                        </div>
                    </nav>
                
            
            <div class="mydiv">
                <img src="prva.jpg">
                
                
                
            </div>
         
               
 
            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">PSI I VLASNICI</h4>
                  </div>
                  <div class="modal-body">
                    <table class="table table-striped table-hover">
                <thead>
                    <tr>

                    <th>Ime</th>
                    <th>Datum rođenja</th>
                    <th>Ime vlasnika</th>
                    <th>Prezime vlasnika</th>
                    

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
                            
                         
                                
                            $sql = "SELECT p.ime as 'pas', p.godina_rodenja, v.ime, v.prezime FROM pas p, vlasnik v, posjeduje pos WHERE p.id=pos.pas_id and v.id=pos.vlasnik_id";
                            $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                        echo "<tr style='text-align: left;'>";
                                            echo "<td >".$row["pas"]. "</td>";
                                            echo "<td>".$row["godina_rodenja"]. "</td>";
                                            echo "<td>".$row["ime"]. "</td>";
                                            echo "<td>".$row["prezime"]. "</td>";

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
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  </div>
                </div>

              </div>
            </div>
  
        
          
        
      
        <script>
            var myVar;

            function myFunction() {
                myVar = setTimeout(showPage, 1000);
            }

            function showPage() {
              document.getElementById("loader").style.display = "none";
              document.getElementById("myDiv").style.display = "block";
            }
        </script>
    </body>
</html>
