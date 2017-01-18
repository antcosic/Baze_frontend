<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "baza";
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    }
    $result2 = "";
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["submit3"])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT username, password FROM registracija WHERE registracija.username='$username' AND registracija.password='$password'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            header("Location: home.php");
        } else {
            $result2="<div class='alert alert-dismissible alert-danger'>
                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        <strong>Unijeli ste krivi username ili password!!</strong>
                      </div>" ;
        }
    }
    $conn->close();
?>


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
    <body>
        <div class="container" style="margin-top:40px">
		<div class="row">
			<div class="col-sm-6 col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong> Prijavi se za nastavak </strong>
					</div>
					<div class="panel-body">
                                            <form role="form" action="index.php" method="POST">
							<fieldset>
								<div class="row">
									<div class="center-block">
                                                                            <div style="text-align: center;">
										<img class="profile-img"
                                                                                     src="user-icon.png" alt="">
                                                                            </div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12 col-md-10  col-md-offset-1 ">
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-user"></i>
												</span> 
												<input class="form-control" placeholder="Username" name="username" type="text" autofocus>
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-lock"></i>
												</span>
												<input class="form-control" placeholder="Password" name="password" type="password" value="">
											</div>
										</div>
										<div class="form-group">
											<input type="submit" class="btn btn-lg btn-primary btn-block" name="submit3" value="Sign in">
										</div>
									</div>
								</div>
							</fieldset>
                                                        
						</form>
                                                <?php echo $result2; ?>
					</div>
					<div class="panel-footer ">
						Nemaš račun? <a href="signup.php"> Prijavi se ovdje </a>
					</div>
                </div>
			</div>
		</div>
	</div>
        
        
    </body>
</html>
