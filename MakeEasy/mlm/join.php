<?php
    include('php-includes/connect.php');
    include('php-includes/check-login.php');
    $userid = $_SESSION['userid'];
    $capping=500;
?>
<?php
    //user clicked join button
    if(isset($_POST['join_user']))
    {
        $side='';
        $pin=mysqli_real_escape_string($con,$_POST['pin']);
        $name=mysqli_real_escape_string($con,$_POST['name']);
        $email=mysqli_real_escape_string($con,$_POST['email']);
        $mobile=mysqli_real_escape_string($con,$_POST['mobile']);
        $address=mysqli_real_escape_string($con,$_POST['address']);
        $account=mysqli_real_escape_string($con,$_POST['account']);
        $under_userid=mysqli_real_escape_string($con,$_POST['under_userid']);
      @ $side=mysqli_real_escape_string($con,$_POST['side']);
        $password="123456";
        $flag=0;

        if($pin!='' && $name!='' && $email!='' && $mobile!='' && $address!='' && $account!='' && $under_userid!='' && $side!='')
        {
            //user fill all fileds
            if(pin_check($pin))
            {   //pin is ok
                if(name($name))
                {// name is ok
                if(email_check($email))
                {   //email is ok
                    if(mobile_check($mobile))
                    {
                        if(account_check($account))
                        {
                            if(!email_check($under_userid))
                            {   //under userid is ok
                                if(side_check($under_userid,$side))
                                {   //side check
                                    $flag=1;
                                }
                                else
                                {  //check under userid
                                    echo '<script>alert("The side you selected is not availble");</script>';    
                                }
                            }
                            else
                            {   //check under userid
                                echo '<script>alert("Invalid Under memberid");</script>';    
                            }       
                        }
                        else
                        {
                            echo '<script>alert("This Account Number is already availble");</script>';        
                        }    
                    }
                    else
                    {
                        echo '<script>alert("This Mobile Number is already availble");</script>';    
                    }
                }
                else
                {   //check email
                    echo '<script>alert("This memberid is already availble");</script>';    
                }
                }
                else{
                    echo '<script>alert("Do not use number.You Can use only character.");</script>';    
                }
            }
            else
            {   //check pin
                echo '<script>alert("Invalid Pin");</script>';    
            }
        }
        else
        {   //check all filed are fill
            echo '<script>alert("Please fill all the fileds");</script>';
        }
        // Now We are here.
        // It mens all the information is correct
        // Now we will save all the information
        if($flag==1)
        {   //insert into user profile
            $query=mysqli_query($con,"INSERT INTO user(`name`,`email`,`password`,`mobile`,`address`,`account`,`under_userid`,`side`) VALUES('$name','$email','$password','$mobile','$address','$account','$under_userid','$side')");
            //insert into tree
            //so that later on we can view tree
            $query=mysqli_query($con,"INSERT INTO tree(`name`,`userid`) VALUES('$name','$email')");
            //insert into side
            $query=mysqli_query($con,"UPDATE tree SET `$side`='$email' WHERE userid='$under_userid'");
            //Update pin ststus to close
            $query=mysqli_query($con,"UPDATE pin_list SET status='close' WHERE pin='$pin'");
            //inser into income
            $query=mysqli_query($con,"INSERT INTO income(`userid`) VALUES('$email')");
            echo mysqli_error($con);
            //this is the main part to join user
            //if any mistake here then the site not work


            //update count and income
            $temp_under_userid=$under_userid;
            $temp_side_count=$side.'count'; //leftcount or rightcount
            $temp_side=$side;
            $total_count=1;
            $i=1;
            while($total_count>0)
           
            {   $i;
                
                $query=mysqli_query($con,"SELECT * FROM tree where userid='$temp_under_userid'");
                $result=mysqli_fetch_array($query);
                $current_temp_side_count=$result[$temp_side_count]+1;
                $temp_under_userid;
                $temp_side_count;
                mysqli_query($con,"UPDATE tree SET `$temp_side_count`=$current_temp_side_count WHERE userid='$temp_under_userid'");

                //income
                if($temp_under_userid!="")
                {
                    $income_data=income($temp_under_userid);
                    //check capping
                    //$income_data['day_bal'];
                    if($income_data['day_bal']<$capping)
                    {   //All Tree information here
                        $tree_data=tree($temp_under_userid);
                        //check leftpluseright
                        //$tree_data['leftcount'];
                        //$tree_data['rightcount'];
                        //$leftplusright;
                        $temp_left_count=$tree_data['leftcount'];
                        $temp_right_count=$tree_data['rightcount'];
                        //Both left and right side should at least 1 user
                        if($temp_left_count>0 && $temp_right_count>0)
                        {   //check the side user selected
                            //According to side user selected will opration here
                            if($temp_side=='left')
                            {   //if user selected left side will come here
                                $temp_left_count;
                                $temp_right_count;
                                if($temp_left_count<=$temp_right_count)
                                {
                                    $new_day_bal=$income_data['day_bal']+100;
                                    $new_current_bal=$income_data['current_bal']+100;
                                    $new_total_bal=$income_data['total_bal']+100;

                                    //update income
                                    mysqli_query($con,"UPDATE income SET day_bal='$new_day_bal',current_bal='$new_current_bal',total_bal='$new_total_bal' WHERE userid='$temp_under_userid' limit 1");
                                }
                            }
                            else
                            {    //if user selected left side will come here
                                if($temp_right_count<=$temp_left_count)
                                {
                                    $new_day_bal=$income_data['day_bal']+100;
                                    $new_current_bal=$income_data['current_bal']+100;
                                    $new_total_bal=$income_data['total_bal']+100;
                                    $temp_under_userid;
                                    //update income
                                    if(mysqli_query($con,"UPDATE income SET day_bal='$new_day_bal',current_bal='$new_current_bal',total_bal='$new_total_bal' WHERE userid='$temp_under_userid'")){
                                        
                                    }
                                }
                            }

                        }//Both left and right side should at least 1 user
                    }
                    //change under userid
                    $next_under_userid=getUnderId($temp_under_userid);
                    $temp_side=getUnderIdPlace($temp_under_userid);
                    $temp_side_count=$temp_side.'count';
                    $temp_under_userid=$next_under_userid;
                    $i++;
                }//income strat if

                //if under_userid is root then no need to update any other user.
                //and exit from loop
                //check for last user
                if($temp_under_userid=="")
                {
                    $total_count=0;
                }
            }//loop
            echo mysqli_error($con);
            echo '<script>alert("Join Member Is Successfully..");</script>';
        }
    }
?><!--Join User-->
<?php
//function
    function pin_check($pin)
    {
       global $con,$userid;
       $query=mysqli_query($con,"SELECT * FROM pin_list WHERE pin='$pin' AND userid='$userid' AND status='open'");
       if(mysqli_num_rows($query)>0)
       {
           return TRUE;
       }
       else
       {
           return FALSE;
       }
    }
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
       $allowedNumber='1234567890';
       $str = '';
       for ($i   = 0; $i < strlen($mobile); $i++)
       {
           if (!stristr($allowedNumber, $mobile[$i]))
           {
               continue;
           }

           $str .= $mobile[$i];
       }

       return $str;
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
    function side_check($email,$side)
    {
       global $con;
       $query=mysqli_query($con,"SELECT * FROM tree WHERE userid='$email'");
       $result=mysqli_fetch_array($query);
       $side_value=$result[$side];
       if($side_value=='')
       {
           return TRUE;
       }
       else
       {
           return FALSE;
       }
    }
    function income($userid)
    {
       global $con;
       $data=array();
       $query=mysqli_query($con,"SELECT * FROM income where userid='$userid'");
       $result=mysqli_fetch_array($query);
       $data['day_bal']=$result['day_bal'];
       $data['current_bal']=$result['current_bal'];
       $data['total_bal']=$result['total_bal'];
       return $data;
    }
    function tree($userid)
    {
       global $con;
       $data=array();
       $query=mysqli_query($con,"SELECT * FROM tree where userid='$userid'");
       $result=mysqli_fetch_array($query);
       $data['left']=$result['left'];
       $data['right']=$result['right'];
       $data['leftcount']=$result['leftcount'];
       $data['rightcount']=$result['rightcount'];
       return $data;
    }
    function getUnderId($userid)
    {
        global $con;
        $query=mysqli_query($con,"SELECT * FROM user WHERE email='$userid'");
        $result=mysqli_fetch_array($query);
        return $result['under_userid'];
    }
    function getUnderIdPlace($userid)
    {
        global $con;
        $query=mysqli_query($con,"SELECT * FROM user WHERE email='$userid'");
        $result=mysqli_fetch_array($query);
        return $result['side'];
    }
    function name($name, $allowedChars = 'abcdefghijklmnopqrstuvwxyz ')
    {
        $str = '';
        for ($i   = 0; $i < strlen($name); $i++)
        {
            if (!stristr($allowedChars, $name[$i]))
            {
                continue;
            }

            $str .= $name[$i];
        }

        return $str;
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

    <title>MakeEasy-Join</title>

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
                        <h1 class="page-header"><i class="fa fa-user-plus"></i> Join</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                	<div class="col-lg-4">
                        <form method="POST" autocomplete="off">
                            <div class="form-group">
                                <label>Pin</label>
                                <input type="text" name="pin"  class="form-control" placeholder="Enter New Pin" maxlength="6"  required pattern="[0-9]{6}$" oninvalid="this.setCustomValidity('Enter Pin,Only digit')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" placeholder="Enter New Member Name" class="form-control"  required pattern="[a-zA-Z]{2,20}$" oninvalid="this.setCustomValidity('Enter name here between 2 to 20,Only character')" oninput="setCustomValidity('')">
                              
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
                                <label>Under Userid</label>
                                <input type="text" name="under_userid" class="form-control" require placeholder="Enter Your Id">
                            </div>
                            <div class="form-group">
                                <label>Side</label><br>
                                <input type="radio" name="side" value="left">Left
                                <input type="radio" name="side" value="right">Right
                            </div>
                            <div class="form-group">
                                <input type="submit" name="join_user" class="btn btn-primary" value="Join">
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
