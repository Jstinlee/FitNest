<?php include("process.php");

$error = "";

if (array_key_exists("login_user", $_POST)) {
  $link = mysqli_connect("localhost", "root", "", "a2");

  if (mysqli_connect_error()){
    die ("Connection error");
        }
  if (!$_POST['username']) {

    $error .= "username is required.<br><br>";
    }
  if(!$_POST['password']){

    $error .= "password is required.<br><br>";
    }
	$username = mysqli_real_escape_string($mysqli, $_POST['username']);
  $password = mysqli_real_escape_string($mysqli, $_POST['password']);
  $query = "SELECT password FROM users WHERE username = '$username'";
  $result = mysqli_query($link,$query);
  $row = mysqli_fetch_assoc($result);
  $userPw = $row['password'];

  if($password != $userPw){
    $error .= "Wrong password<br>";
  }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <link rel = "icon" type = "image/png" href= "image/icon.png">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Six+Caps" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Asap+Condensed" rel="stylesheet">
  <title>FitNest - Login</title>
  <link rel="stylesheet" type="text/css" href="panelstyle.css">
</head>

<body>
<header>
<nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
    <div class="container">
	<div class="row">
	<div class="col-sm-1">
      <a class="nav" href="index.html">FitNest</a>
	</div>
	<div class="col-sm-1 offset-sm-9">
		<a class="nav2" href="login.php">Login</a>
	</div>
	<div class="col-sm-1">
		<a class="nav2" href="signup.php">Signup</a>
	</div>
	</div>
    </div>
  </nav>


 <div class="jumbotron">
    <div class="container">

  <a href="index.html"><h1>FitNest</h1></a>
  <h2>Login</h2>

    </div>
  </div>
</header>
<body>

<div class="container">
<h3>Welcome back. Please enter your email address and password, and click "<b>Log in</b>".</h3><br/><br/>
<?php
  if($error != ""){
    echo "<div class='alert alert-danger' role='alert'> $error </div>";
}
   ?>
  <div class="row">
  <div class="col-md-6">
	<form method="POST" action="login.php">
		<div class="group">
          <input type="text" name="username" ><span class="highlight"></span><span class="bar"></span>
		  <label class="field">Username</label>
        </div>
		<div class="group">
          <input type="password" name="password" ><span class="highlight"></span><span class="bar"></span>
		  <label class="field">Password</label>
        </div>
		<div class="group">
		<div class="group">
              <button type="submit" name="login_user" class="btn btn-orange btn-md">Log in</button>
              <a href="signup.php" class="btn btn-orange btn-md">Create New Account</a>
		</div>
		</div>
		</div>
	</form>
  </div>
</div>
<br /> <br />
<footer>
<div class="container-fluid">

		<p>FitNest</p>
		<footer2>Copyright 2017</footer2>

</div>
</footer>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

	<script src="panelscript.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>
