mlm/index.php
<!DOCTYPE html>
<html>
<head>
	<title>SignUp and Login</title>
	
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


	
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container" id="container">
<div class="form-container sign-up-container">

<form method="POST" action="signup.php" onsubmit="return validation()">
    <h1>Create Account</h1>
    
    <span>or use your email for registration</span>
    <input type="text" name="name" class="form-control" id="user" autocomplete="off" placeholder="Name">
                    <span id="username" class="text-danger font-weight-bold"> </span>
    <input type="text" name="email" class="form-control" id="emails" autocomplete="off" placeholder="Email">
                    <span id="emailids" class="text-danger font-weight-bold"> </span>
    <input type="password" name="password" class="form-control" id="pass" autocomplete="off" placeholder="Password">
                    <span id="passwords" class="text-danger font-weight-bold"> </span>
    <input type="text" name="mobile" class="form-control" id="mobileNumber" maxlength="10" autocomplete="off" placeholder="Mobile">
                    <span id="mobileno" class="text-danger font-weight-bold"> </span>
    <input type="text" name="address" class="form-control" id="add" autocomplete="off" placeholder="Address">
                    <span id="addresss" class="text-danger font-weight-bold"> </span>
    <input type="text" name="account" class="form-control" id="accountNumber" maxlength="11" autocomplete="off" placeholder="Account"
                    <span id="accountno" class="text-danger font-weight-bold"> </span>
    <button  type="submit" name="signup">Signup</button>
    
</form>
</div>
<div class="form-container sign-in-container">
    <form method="POST" action="login.php" autocomplete="off">
	<img src="logo-via-logohub (2).png" height="50px" width="150px" >
        <h1>Login</h1>
        
    <span>or use your account</span>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
    </form>
</div>
<div class="overlay-container">
    <div class="overlay">
        <div class="overlay-panel overlay-left">
            <h1>Welcome Back!</h1>
            <p>To keep connected with us please login with your personal info</p>
            <button class="ghost" id="signIn">Login</button>
        </div>
        <div class="overlay-panel overlay-right">
            <h1>Hello, Friend!</h1>
            <p>Enter your details and Register</p>
            <button class="ghost" id="signUp">Sign Up</button>

        </div>
    </div>
</div>
</div>

<script type="text/javascript">
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    signUpButton.addEventListener('click', () => {
        container.classList.add("right-panel-active");
    });
    signInButton.addEventListener('click', () => {
        container.classList.remove("right-panel-active");
    });
</script>
<script type="text/javascript">
		

		function validation(){

			var user = document.getElementById('user').value;
            var emails = document.getElementById('emails').value;
			var pass = document.getElementById('pass').value;
			var mobileNumber = document.getElementById('mobileNumber').value;
			var add=document.getElementById('add').value;
            if(user == ""){
				document.getElementById('username').innerHTML =" ** Please fill the name field";
				return false;
			}
			if((user.length <= 2) || (user.length > 20)) {
				document.getElementById('username').innerHTML =" ** name lenght must be between 2 and 20";
				return false;	
			}
			if(!isNaN(user)){
				document.getElementById('username').innerHTML =" ** only characters are allowed";
				return false;
			}


            if(emails == ""){
				document.getElementById('emailids').innerHTML =" ** Please fill the email id field";
				return false;
			}
			if(emails.indexOf('@') <= 0 ){
				document.getElementById('emailids').innerHTML =" ** @ Invalid Position";
				return false;
			}
			if((emails.charAt(emails.length-4)!='.') && (emails.charAt(emails.length-3)!='.')){
				document.getElementById('emailids').innerHTML =" ** . Invalid Position";
				return false;
			}


			if(pass == ""){
				document.getElementById('passwords').innerHTML =" ** Please fill the password field";
				return false;
			}
			if((pass.length <= 5) || (pass.length > 20)) {
				document.getElementById('passwords').innerHTML =" ** Passwords lenght must be between  5 and 20";
				return false;	
			}


			if(mobileNumber == ""){
				document.getElementById('mobileno').innerHTML =" ** Please fill the mobile Number field";
				return false;
			}
			if(isNaN(mobileNumber)){
				document.getElementById('mobileno').innerHTML =" ** user must write digits only not characters";
				return false;
			}
			if(mobileNumber.length!=10){
				document.getElementById('mobileno').innerHTML =" ** Mobile Number must be 10 digits only";
				return false;
			}

            if(add == ""){
				document.getElementById('addresss').innerHTML =" ** Please fill the address field";
				return false;
			}


            if(accountNumber == ""){
				document.getElementById('accountno').innerHTML =" ** Please fill the Account Number field";
				return false;
			}
			if(isNaN(accountNumber)){
				document.getElementById('accountno').innerHTML =" ** user must write digits only not characters";
				return false;
			}
			if(accountNumber.length!=11){
				document.getElementById('accountno').innerHTML =" ** Account Number must be 11 digits only";
				return false;
			}
			
		}

	</script>

</body>
</html>








