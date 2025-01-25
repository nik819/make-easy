<?php
    include('php-includes/connect.php');
    include('php-includes/check-login.php');
    $adminid = $_SESSION['adminid'];
   
?>
<?php
    //user clicked join button
    if(isset($_POST['join_user']))
    {
        
       
        $name=mysqli_real_escape_string($con,$_POST['name']);
        $email=mysqli_real_escape_string($con,$_POST['email']);
        $mobile=mysqli_real_escape_string($con,$_POST['mobile']);
        $address=mysqli_real_escape_string($con,$_POST['address']);
        $account=mysqli_real_escape_string($con,$_POST['account']);
        $password="123456";
      

        if( $name!='' && $email!='' && $mobile!='' && $address!='' && $account!='')
        {
            //user fill all fileds
                if(email_check($email))
                {   //email is ok
                   
                   if(mobile_check($mobile))
                   {
                        if(account_check($account))
                        {
                            $query=mysqli_query($con,"INSERT INTO user(`name`,`email`,`password`,`mobile`,`address`,`account`) VALUES('$name','$email','$password','$mobile','$address','$account')");
                        }
                        else
                        {
                            echo '<script>alert("This Account Number is already used...")</script>';
                        }
                   }
                   else
                   {
                       echo '<script>alert("This mobile number is already used...")</script>';
                   }
                }
                else
                {   //check email
                    echo '<script>alert("This memberid is already availble...");</script>';    
                }
        }
        else
        {   //check all filed are fill
            echo '<script>alert("Please fill all the fileds");</script>';
        }
         echo '<script>alert("Member Add Successfully..");window.location.assign("home.php");</script>';
}

?><!--Join Member-->
<?php
//function
 
    function email_check($email)
    {
       global $con;
       $query=mysqli_query($con,"SELECT * FROM user WHERE email='$email'");
       if(mysqli_num_rows($query)>0)
       {
           return FALSE;
       }
       else
       {
           return TRUE;
       }
    }
    function mobile_check($mobile)
    {
       global $con;
       $query=mysqli_query($con,"SELECT * FROM user WHERE mobile='$mobile'");
       if(mysqli_num_rows($query)>0)
       {
           return FALSE;
       }
       else
       {
           return TRUE;
       }
    }
    function account_check($account)
    {
       global $con;
       $query=mysqli_query($con,"SELECT * FROM user WHERE account='$account'");
       if(mysqli_num_rows($query)>0)
       {
           return FALSE;
       }
       else
       {
           return TRUE;
       }
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MakeEasy-Add New Member</title>
    <link rel="icon" href="img/core-img/favicon1.ico">
    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

 

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include('php-includes/menu.php'); ?>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><i class="fa fa-user-plus"></i> Add New member</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                	<div class="col-lg-4">
                        <form method="POST" autocomplete="off">
                          
                            <div class="form-group">
                                <label>Name</label>
                                
                                <input type="text" name="name" placeholder="Enter New Member Name" class="form-control"  required pattern="[a-zA-Z]{2,20}$" oninvalid="this.setCustomValidity('Enter user name here between 2 to 20,Only character')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                
                                <input type="email" name="email"  class="form-control" placeholder="Enter Email Id"  required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" oninvalid="this.setCustomValidity('Enter Email Id')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <label>Mobile</label>
                                
                                <input type="text" name="mobile"  class="form-control" placeholder="Enter Mobile Number" maxlength="10"  required pattern="[0-9]{10}$" oninvalid="this.setCustomValidity('Enter Mobile Number 10 Digit')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <label for="my-textarea">Address</label>
                                <textarea id="my-textarea" class="form-control" name="address" rows="3" placeholder="Enter Address"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Account</label>
                                
                                <input type="text" name="account"  class="form-control" placeholder="Enter Account Number" maxlength="11"  required pattern="[0-9]{11}$" oninvalid="this.setCustomValidity('Enter Account Number 11 Digit')" oninput="setCustomValidity('')">
                            </div>
                         
                            
                            <div class="form-group">
                                <input type="submit" name="join_user" class="btn btn-primary" value="Add">
                            </div>
                        </form>
                    </div>
                </div><!--/.row-->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

</body>

</html>

