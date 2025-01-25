<?php
	include('php-includes/connect.php');

?>
<?php
    //user clicked join btn
    if(isset($_POST['signup']))
    {
        
       
        $name=mysqli_real_escape_string($con,$_POST['name']);
		$email=mysqli_real_escape_string($con,$_POST['email']);
		$password=mysqli_real_escape_string($con,$_POST['password']);
        $mobile=mysqli_real_escape_string($con,$_POST['mobile']);
        $address=mysqli_real_escape_string($con,$_POST['address']);
        $account=mysqli_real_escape_string($con,$_POST['account']);
       
      

        if( $name!='' && $email!='' && $password!='' && $mobile!='' && $address!='' && $account!='')
        {
            //user fill all fileds
                if(email_check($email))
                {   //email is ok
                   
                   if(mobile_check($mobile))
                   {
                        if(account_check($account))
                        {
							$query=mysqli_query($con,"INSERT INTO user(`name`,`email`,`password`,`mobile`,`address`,`account`) VALUES('$name','$email','$password','$mobile','$address','$account')");
							echo '<script>alert("Register Successfully..");window.location.assign("index.php");</script>';
                        }
                        else
                        {
                            echo '<script>alert("This Account Number is already used...");window.location.assign("index.php");</script>';
                        }
                   }
                   else
                   {
                       echo '<script>alert("This mobile number is already used...");window.location.assign("index.php");</script>';
                   }
                }
                else
                {   //check email
                    echo '<script>alert("This memberid is already availble...");window.location.assign("index.php");</script>';    
                }
        }
        else
        {   //check all filed are fill
            echo '<script>alert("Please fill all the fileds");window.location.assign("index.php");</script>';
        }
		
	
}

?>
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
