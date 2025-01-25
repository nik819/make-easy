<?php
include('php-includes/check-login.php');
require('php-includes/connect.php');
?>
<?php
    if(isset($_GET['userid']))
    {
        $userid=mysqli_real_escape_string($con,$_GET['userid']);
        $amount=mysqli_real_escape_string($con,$_GET['amount']);

        $date= date("Y-m-d");

        $query=mysqli_query($con,"INSERT INTO income_received (`userid`,`amount`,`date`) VALUES('$userid','$amount','$date')");
        $query=mysqli_query($con,"UPDATE income SET current_bal=0 WHERE userid='$userid'");

        echo '<script>alert("Payment has paid");window.location.assign("income.php");</script>';
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

    <title>MakeEasy- Send Income</title>
    <link rel="icon" href="img/core-img/favicon1.ico">
    <link rel="stylesheet" type="text/css" href="style1.css">
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
                        <h1 class="page-header"><i class="fa fa-send"> Send Income</i></h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Serial No</th>
                                        <th>UserId</th>
                                        <th>Amount</th>
                                        <th>Account</th>
                                        <th>Send</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $query=mysqli_query($con,"SELECT * FROM income WHERE current_bal>=100");
                                        if(mysqli_num_rows($query)>0)
                                        {
                                            $i=1;
                                            while($row=mysqli_fetch_array($query)){
                                                $userid=$row['userid'];
                                                $amount=$row['current_bal'];

                                                $query_user=mysqli_query($con,"SELECT * FROM user WHERE email='$userid'");
                                                $result=mysqli_fetch_array($query_user);
                                                $account=$result['account'];

                                              ?>
                                                <tr>
                                                    <td><?php echo $i;?></td>
                                                    <td><?php echo $userid;?></td>
                                                    <td><?php echo $amount;?></td>
                                                    <td><?php echo $account;?></td>
                                                    <td>
                                                        <a href="income.php ? <?php echo 'userid='.$userid.'&amount='.$amount?>" class="send_btn fa fa-send"> Send</a>
                                                        
                                                    </td>
                                                </tr>
                                              <?php  
                                                $i++;
                                            }
                                        }
                                        else
                                        {
                                    ?>
                                        <tr>
                                            <td colspan="5">No Member exist</td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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
