<?php
  session_start();
  include('editProfile.php');
  $user = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel = "icon" type = "image/png" href= "image/icon.png">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Six+Caps" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Asap+Condensed" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="panelstyle.css">
  <title>FitNest - Member Profile</title>
</head>

<body>
<header>
<nav class="navbar navbar-toggleable-md navbar-inverse nav">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a href="loginM.php">FitNest</a>
	<div class="offset-sm-5"></div>
    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle nav3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Account</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="editProfileM.php">Edit Profile</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="logout.php?logout=1">Log Out</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle nav3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Training</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="registerM.php">Register for Training Session</a>
			<div class="dropdown-divider"></div>
            <a class="dropdown-item" href="historyM.php">Training History</a>
          </div>
        </li>
        </li>
      </ul>
	        <div class="form-inline my-2 my-lg-0">
      <a href=""><img src="image/user.jpg" height="40pt" width="40pt"></a>
      </div>
      <div class="form-inline my-2 my-lg-1">
        &nbsp;<a href="" style="font-family:Ostrich Sans Medium;color:white;font-size:20pt;">
		<?php
                  $user = $_SESSION['username'];
                  echo $user;
        ?></a>

      </div>
</div>
</div>
</nav>

 <div class="jumbotron">
    <div class="container">

  <h22>Member Profile</h22>
  <p>View or edit your profile information.</p>

    </div>
  </div>
</header>

<div class="container">
<h3>Account Settings</h3><br/><br/>

  <div class="row">
	<div class="tabcontent col-md-6" id="member">
	<form method="POST" action="editProfileM.php" enctype="multipart/form-data">
		<div class="group">
          <input type="text" name="userName" value="<?php
          $query = "SELECT userName FROM Users WHERE username = '$user'";
          $result = mysqli_query($mysqli,$query);
          $row = mysqli_fetch_assoc($result);
          echo $row['userName'];?>"
          disabled/><span class="highlight"></span><span class="bar"></span>
		  <label class="field">Username</label>
        </div>
		<div class="group">
			<label>Profile Picture</label><br/>
			<img id="myImg" src="image/user.jpg" alt="your image" height="80pt" width="80pt">
			<input type='file' name="profile">
        </div>
		<div class="group">
          <input type="password" name="password" id="password" value="<?php
          $query = "SELECT password FROM Users WHERE username = '$user'";
          $result = mysqli_query($mysqli,$query);
          $row = mysqli_fetch_assoc($result);
          echo $row['password'];?>"
          ><span class="highlight"></span><span class="bar"></span>
		  <label class="field">Password</label>
        </div>
    <div class="group">
          <input type="password" name="confirm_password" id="confirm_password" onkeyup="check()" required/><span class="bar"></span><span id="message"></span>
		  <label class="field">Re-enter password</label>
        </div>
		<div class="group">
          <input type="text" name="name" value="<?php
          $query = "SELECT name FROM Users WHERE username = '$user'";
          $result = mysqli_query($mysqli,$query);
          $row = mysqli_fetch_assoc($result);
          echo $row['name'];?>"
          ><span class="highlight"></span><span class="bar"></span>
		  <label class="field">Full Name</label>
        </div>
		<div class="group">
          <input type="email" name="email" value="<?php
          $query = "SELECT email FROM Users WHERE username = '$user'";
          $result = mysqli_query($mysqli,$query);
          $row = mysqli_fetch_assoc($result);
          echo $row['email'];?>"
		  
          ><span class="highlight"></span><span class="bar"></span>
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
              <button name="updateM" type="submit" class="btn btn-orange col-md-12">Update Changes</button>
			  <a href="loginM.php" class="btn btn-orange btn-md">Cancel</a>
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
