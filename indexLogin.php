<!DOCTYPE html>
<html lang="en">

<head>
	<title>Admin Login</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="sign-up_style.css">
    <script src="signupScript.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<style>
	* { margin: 0px; padding: 0px; }
body {
	font-size: 120%;
	background: #F8F8FF;
}
.header {
	width: 40%;
	margin: 110px auto 0px;
	color: white;
	background: rgb(107,8,8);
	text-align: center;
	border: 1px solid #B0C4DE;
	border-bottom: none;
	border-radius: 10px 10px 0px 0px;
	padding: 20px;
}
form, .content {
	width: 40%;
	margin: 0px auto;
	padding: 20px;
	border: 1px solid #B0C4DE;
	background: white;
	border-radius: 0px 0px 10px 10px;
}
.input-group {
	margin: 10px 0px 10px 0px;
	text-align:center;
}
.input-group label {
	display: block;
	text-align: left;
	margin: 3px;
}
.input-group input {
	height: 30px;
	width: 93%;
	padding: 5px 10px;
	font-size: 16px;
	border-radius: 5px;
	border: 1px solid gray;
	
}
#user_type {
	height: 40px;
	width: 98%;
	padding: 5px 10px;
	background: white;
	font-size: 16px;
	border-radius: 5px;
	border: 1px solid gray;
}
.btn {
	padding: 10px;
	font-size: 15px;
	color: white;
	background: rgb(107,8,8);
	border: none;
	border-radius: 5px;
	
}


.btn-primary {
    background-color: rgb(104, 7, 7);
    border-color: rgb(104, 7, 7);
	margin-left : 200px;
	width: 100px;
	
}
.error {
	width: 92%; 
	margin: 0px auto; 
	padding: 10px; 
	border: 1px solid #a94442; 
	color: #a94442; 
	background: #f2dede; 
	border-radius: 5px; 
	text-align: left;
}
.success {
	color: #3c763d; 
	background: #dff0d8; 
	border: 1px solid #3c763d;
	margin-bottom: 20px;
}
.profile_info img {
	display: inline-block; 
	width: 50px; 
	height: 50px; 
	margin: 5px;
	float: left;
}
.profile_info div {
	display: inline-block; 
	margin: 5px;
}
.profile_info:after {
	content: "";
	display: block;
	clear: both;
}
</style>
</head>
<!-- navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">

        <!-- logo-->
        <a class="navbar-brand" href="#">
            <img src="logo.png" alt="ashesi logo" class="logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

        <!-- left navigation links-->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Clubs.html">Clubs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Calender</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="Sign-up.html">Sign up</a>
                </li>
            </ul>
            </li>
            </ul>
        </div>
    </div>
</nav>

<!DOCTYPE html>
<html>

<body>
<div class="header">
	<h2>Admin Login</h2>
</div>
<form method="POST" action="">
	<div class="input-group">
		<label>Username</label>
		<input type="text" name="admin_name" value="Admin">
	</div>

	<div class="input-group">
		<label>Password</label>
		<input type="password" name="admin_password">
	</div>

	<div class="input-group">
	<p><a href="view.php" class="btn btn-primary btn" role="button" >Login</a></p>
	</div>




<?php if (isset($_POST['register'])) {
    // username and password sent from form
    $myusername = $_POST['admin_name'];
    $mypassword = $_POST['admin_password'];
    print_r($_POST);
    // To protect MySQL injection (more detail about MySQL injection)
    $myusername = stripslashes($myusername);
    $mypassword = stripslashes($mypassword);
    $myusername = mysql_real_escape_string($myusername);
    $mypassword = mysql_real_escape_string($mypassword);

    $sql = "SELECT * FROM adminn WHERE admin_name='$myusername' and admin_password ='$mypassword'";
    $result = mysql_query($sql);

    // Mysql_num_row is counting table row
    $count = mysql_num_rows($result);
    // If result matched $myusername and $mypassword, table row must be 1 row

    if ($count == 1) {
        // Register $myusername, $mypassword and redirect to file "login_success.php"
        header('location:view.php');
    } else {
        header('location:index.html');
    }
} ?>
</body>
</html>