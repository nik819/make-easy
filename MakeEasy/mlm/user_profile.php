<?php
include('php-includes/connect.php');
include('php-includes/check-login.php');
$userid = $_SESSION['userid'];
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MakeEasy - User Profile</title>

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
                        <h1 class="page-header"><i class="fa fa-user"></i> User Profile</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                	<div class="col-lg-4">
                    	<div class="table-responsive">
                        	<table class="table table-bordered table-striped">
                            
                                        <?php $res5 = mysqli_query($con, "select * from user where email='$_SESSION[userid]' ");
                                       while($row5 = mysqli_fetch_array($res5)){
                                       $name = $row5['name'];
                                          $email = $row5['email'];
                                          $mobile= $row5['mobile'];
                                          $address= $row5['address'];
                                          $account =$row5['account'];
                                             $under_userid=$row5['under_userid'];
                                        $side=$row5['side'];
                                        }
                                        ?>
                                        
                                       <form method="post">
                                             <div class="form-group">
                                                <label for="name" class="text-right">Name:</label>
                                                <!-- <input type="text" class="form-control custom"  name="name"  value="<?php echo $name; ?>" /> -->
                                                <input type="text" name="name" placeholder="Enter New  Name" class="form-control"  required pattern="[a-zA-Z]{2,20}$" oninvalid="this.setCustomValidity('Enter user name here between 2 to 20,Only character')" oninput="setCustomValidity('')"  value="<?php echo $name; ?>">
                                            
                                                <label for="email">Email:</label>
                                                <input type="text" class="form-control custom" placeholder="Email" name="email" value="<?php echo $email; ?>" disabled />
                                            
                                           
                                                <label for="mobile">Mobile No:</label>
                                                <!-- <input type="text" class="form-control custom"  name="mobile" value="<?php echo $mobile; ?>" require/> -->
                                                <input type="text" name="mobile"  class="form-control" placeholder="Enter Mobile Number" maxlength="10"  required pattern="[0-9]{10}$" oninvalid="this.setCustomValidity('Enter Mobile Number 10 Digit')" oninput="setCustomValidity('')"  value="<?php echo $mobile; ?>">
                                            
                                                <label for="address">Address:</label>
                                                <input type="text" class="form-control custom"  name="address" value="<?php echo $address; ?>" require/>
                                           
                                         
                                                <label for="address">Account:</label>
                                                <input type="text" class="form-control custom"  name="account" value="<?php echo $account; ?>" disabled/>
                                            
                                            <label for="address">Under_MemberId:</label>
                                            <input type="text" class="form-control custom"  name="under_userid" value="<?php echo $under_userid;
                                                if($under_userid==NULL)
                                                { echo "NULL";} ?>" disabled/>
                                         
                                                <label for="address">Side:</label>
                                                <input type="text" class="form-control custom"  name="side" value="<?php echo $side; ?>" disabled/>
                                            </div>
                                            <div class="text-right mt-20">
                                                <input type="submit" value="Save" class="btn btn-danger" name="update">
                                            </div>
                                        </form>
                                        <?php
                                            if (isset($_POST["update"]))
                                            {
                                                mysqli_query($con, "update user set 
                                                name='$_POST[name]',
                                                mobile='$_POST[mobile]',
                                                address='$_POST[address]' 
                                                where email='$_SESSION[userid]'");
                                    
                                                echo"<script>alert('Update Successfully..');window.location.assign('user_profile.php');</script>";
                                             }
                                        ?>
                            </table>
                        </div>
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
