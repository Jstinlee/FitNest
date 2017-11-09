<?php include('process.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <link rel = "icon" type = "image/png" href= "image/icon.png">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Six+Caps" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Asap+Condensed" rel="stylesheet">
  <title>FitNest - Signup</title>
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
  <h2>Create New Account</h2>

    </div>
  </div>
</header>

<div class="container">
<h3>We welcome you to be part of the FitNest family!</h3><br/>
  <button class="tabtitle col-md-3" onclick="swapTab(event, 'member')" id="default">Member</button>
  <button class="tabtitle col-md-3" onclick="swapTab(event, 'trainer')">Trainer</button>
<br/><br/><br/>
  <div class="row">
	<div class="tabcontent col-md-6" id="member">
	<form method="POST" action="signup.php">
		<div class="group">
          <input type="text" name="usernameM" required/><span class="highlight"></span><span class="bar"></span>
		  <label class="field">Username</label>
        </div>
		<div class="group">
          <input type="password" name="passwordM" id="password" required/><span class="highlight"></span><span class="bar"></span>
		  <label class="field">Password</label>
        </div>
		<div class="group">
          <input type="password" name="confirm_password" id="confirm_password" onkeyup="check()" required/><span class="bar"></span><span id="message"></span>
		  <label class="field">Re-type password</label>
        </div>
		<div class="group">
          <input type="text" name="nameM" required/><span class="highlight"></span><span class="bar"></span>
		  <label class="field">Full Name</label>
        </div>
		<div class="group">
          <input type="email" name="emailM" required/><span class="highlight"></span><span class="bar"></span>
		  <label class="field">Email Address</label>
        </div>
		<div class="group">
		 <label class="field">Select Level:</label><br/><br/>
		  <select name="level" class="col-md-12">
		  <option>Beginner</option>
		  <option>Intermediate</option>
		  <option>Expert</option>
		  </select>
        </div>
		<div class="group">
              <button type="submit" name="createM" class="btn btn-orange col-md-12">Create New Account</button>
			  <a href="index.html" class="btn btn-orange btn-md">Cancel</a>
        </div>
	</form>
	</div>

	<div class="tabcontent col-md-6" id="trainer">
	<form method="POST" action="signup.php">
		<div class="group">
          <input type="text" name="usernameT" /><span class="highlight"></span><span class="bar"></span>
		  <label class="field">Username</label>
        </div>
		<div class="group">
          <input type="password" name="passwordT" id="password" required/><span class="highlight"></span><span class="bar"></span>
		  <label class="field">Password</label>
        </div>
		<div class="group">
          <input type="password" name="confirm_password" id="confirm_password" onkeyup="check()" required/><span class="bar"></span><span id="message"></span>
		  <label class="field">Re-type password</label>
        </div>
		<div class="group">
          <input type="text" name="nameT" /><span class="highlight"></span><span class="bar"></span>
		  <label class="field">Full Name</label>
        </div>
		<div class="group">
          <input type="email" name="emailT" /><span class="highlight"></span><span class="bar"></span>
		  <label class="field">Email Address</label>
        </div>
		<div class="group">
          <input type="text" name="specialty" /><span class="highlight"></span><span class="bar"></span>
		  <label class="field">Specialty</label>
        </div>
		<div class="group">
              <button type="submit" name="createT" class="btn btn-orange col-md-12">Create New Account</button>
			  <a href="index.html" class="btn btn-orange btn-md">Cancel</a>
        </div>
	</form>
	</div>
  </div>
</div>
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
