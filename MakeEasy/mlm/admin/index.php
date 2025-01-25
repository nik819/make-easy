<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    
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

        

    <form method="POST" action="login.php" autocomplete="off">
    <div >                      <img src="logo-via-logohub (2).png" height="50px" width="250px" >
        <!-- <h1>Log In</h1> --><h6><span><h1><b>Admin Login</b></h1></span></h6>
    </div>
    
    <input type="text" name="adminid" placeholder="Admin Id" required>
    <input type="password" name="password" placeholder="Password" required>
    

    <button type="submit">LogIn</button>
    </form>


</div> 



</body>
</html>

