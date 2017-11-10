<?php include('process.php') ?>
<?php
$error = "";

if (array_key_exists("registerM", $_POST)) {
  $link = mysqli_connect("localhost", "root", "", "a2");

  if (!$_POST['userNameM']) {
    # code...
    $error .= "Username is Required<br>";
  }
  if (!$_POST['passwordM']) {
    # code...
    $error .= "Password is Required<br>";
  }
  if (!$_POST['emailM']) {
    # code...
    $error .= "Email is Required<br>";
  }
  $sql = "SELECT userName FROM `users` WHERE username ='".mysqli_real_escape_string($link, $_POST['userNameM'])."' LIMIT 1";
  $res = mysqli_query($link, $sql);
  if (mysqli_num_rows($res) > 0) {
        $error .= "Username has been used.<br>";
      }

  if (mysqli_connect_error()){
    die ("Connection error");
        }
      }
elseif (array_key_exists("registerT", $_POST)) {
  $link = mysqli_connect("localhost", "root", "", "a2");

  if (!$_POST['userNameT']) {
    # code...
    $error .= "Username is Required<br>";
  }
  if (!$_POST['passwordT']) {
    # code...
    $error .= "Password is Required<br>";
  }
  if (!$_POST['emailT']) {
    # code...
    $error .= "Email is Required<br>";
  }
  $sql = "SELECT userName FROM `users` WHERE username ='".mysqli_real_escape_string($link, $_POST['userNameT'])."' LIMIT 1";
  $res = mysqli_query($link, $sql);
  if (mysqli_num_rows($res) > 0) {
        $error .= "Username has been used.<br>";
      }

  if (mysqli_connect_error()){
    die ("Connection error");
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
  <title>FitNest - Successfully signed up </title>
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
  <h2>New Account Created!</h2>

    </div>
  </div>
</header>

<div class="container">
<h3>Welcome to the FitNest family! You've successfully signed up!</h3><br/>
<?php
  if($error != ""){
    echo "<div class='alert alert-danger' role='alert'> $error </div><br><br>";
}
   ?>
<br/><br/>
  <div class="row">
	<a href="login.php" class="btn btn-orange btn-md">Login</a>
  </div>
</div>
</div>
<br/><br/><br/>
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
