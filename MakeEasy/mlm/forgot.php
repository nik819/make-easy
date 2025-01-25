<?php
include('php-includes/connect.php');
// include('php-includes/check-login.php');
// $userid = $_SESSION['userid'];

if (isset($_SESSION["userid"])) {
    ?>
        <script type="text/javascript">
            window.location="forgot.php";
        </script>
    <?php
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Forgot</title>
    
    <link rel="icon" href="img/core-img/favicon1.ico">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style type="text/css">
        .class{
                height: 500px;
                width: 500px;

        }
    </style>
</head>
<body>

<div class="container class" id="container"> 

            <!-- <div class="card-header no-border">
                <div class="card-title text-xs-center">
                    <div class="p-1"><img src="F:\Insttaling\Xampp\htdocs\MakeEasy\img\core-img\logo-via-logohub (2).png" alt="branding logo"></div>
                </div>
             </div>
          -->

    <form method="POST">
    <div >                      <img src="logo-via-logohub (2).png" height="50px" width="250px" >
        <!-- <h1>Log In</h1> --><h6><span><h1><b>Forgot</b></h1></span></h6>
    </div>
    
    <input type="text" name="email" placeholder="EmailId" required>
    <!-- <input type="text" name="mobile" placeholder="Mobile" required> -->
    <!-- <a href="#">Forgot Your Password</a> -->

    <button type="submit">Recover</button>
    </form>
    <?php
							if (isset($_POST["submit"])){
							
								$email    = $_POST['email'];
								$mobile    = $_POST['mobile'];
								// $conpass  = $_POST['conpass'];
								$res = mysqli_query($con, "select password from user where email='$_SESSION[userid]'");								
								if($row = mysqli_fetch_array($res)){
                                    $pass   = $row['password'];
                                    echo "Password Is".$pass;
                                }
                                else
                                {
                                    echo"Not Found";
                                }
                            }
								
						?>

</div> 



</body>
</html>

