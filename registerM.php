<?php

    session_start();

    $mysqli = new mysqli("localhost","root","","a2");
    include('enroll.php') ?>
	
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel = "icon" type = "image/png" href= "image/icon.png">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Six+Caps" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Asap+Condensed" rel="stylesheet">
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="panelstyle.css">
  <title>FitNest - Register Training Session</title>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
                      ?>
					  </a>

      </div>
</div>
</div>
</nav>
  <div class="jumbotron">
      <div class="container">
	 <h22>Register New Training Session</h22><br/>
	 <p>Check out some upcoming training sessions and feel free to enroll.</p></div>
 </header>
   <div id="div1" class="targetDiv switch">
	<div class="container">
      <h2>Personal</h2>
      <div class="dropdown">
    <button class="btn btn-orange dropdown-toggle" type="button" data-toggle="dropdown">Personal
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item showSingle" target="2">Group</a></li>
    </ul>
  </div>
  <!-- ALL DATA CODE GO HERE-->
  <div class="papercard">
    <?php
        $array = mysqli_query($mysqli, "SELECT * FROM trainingSession WHERE sessionID NOT IN (SELECT sessionID FROM enrollsession WHERE participant = '$user') AND type = 'Personal' AND status ='Available'");
		if (mysqli_num_rows($array)==0){
			echo "		<div class='paper'>
			<div class='header'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;There are no sessions available.</div></div>";
		}
        while ($row = mysqli_fetch_row($array)){

        $query = "SELECT name,specialty FROM users WHERE username = '$row[7]'";
        $results = mysqli_query($mysqli, $query);
        $row2 = mysqli_fetch_assoc($results);
		$fullname =  $row2['name'];
		$specialty = $row2['specialty'];

		echo "
		<div class='paper'>
		<div class='header'><span class='date'>$row[2]</span>$row[1]<i class='fa fa-chevron-down' aria-hidden='true'></i></div>
			<div class='content'>
			<div class='row'>
			<div class='col-md-5'>
			<div class='contenticon'><i class='fa fa-calendar' aria-hidden='true'></i></div>
			<div class='contentbody'><b>Date</b><br/>$row[2]<br/>$row[3]</div><br/>
			<div class='contenticon'><i class='fa fa-user-circle-o' aria-hidden='true'></i></div>
			<div class='contentbody'><b>Trainer</b><br/>$fullname</div><br/>
			<div class='contenticon'><i class='fa fa-star' aria-hidden='true'></i></div>
			<div class='contentbody'><b>Trainer Specialty</b><br/>$specialty</div><br/>
		</div>
		<div class='col-md-5'>
			<div class='contenticon'><i class='fa fa-usd' aria-hidden='true'></i></div>
			<div class='contentbody'><b>Fee</b><br/>RM $row[4]</div><br/>
			<div class='contenticon'><i class='fa fa-spinner' aria-hidden='true'></i></div>
			<div class='contentbody'><b>Status</b><br/>$row[9]</div><br/>
			<div class='contenticon'><i class='fa fa-tags' aria-hidden='true'></i></div>
			<div class='contentbody'><b>Class Type</b><br/>$row[8]<br/>$row[6]</div><br/>
		</div>
		</div>
		<form method='POST' action='registerM.php'>
		<input type='text' class='hide' name='sessionID' value='$row[0]'>
		<button type='submit' name='enroll' class='btn btn-orange col-md-12'>Enroll Session</button>
		</form>
		</div></div>";
		}
	?>
  </div>
</div>
</div>
<div id="div2" class="targetDiv switch">
<div class="container">
   <h2>Group</h2>
   <br>
   <div class="dropdown">
 <button class="btn btn-orange dropdown-toggle" type="button" data-toggle="dropdown">Group
 <span class="caret"></span></button>
 <ul class="dropdown-menu">
   <li><a class="dropdown-item showSingle" target="1">Personal</a></li>
 </ul>
</div>
<br>
<!--All DATA CODE GO HERE-->

<div class="papercard">
  <?php
        $array = mysqli_query($mysqli, "SELECT * FROM trainingSession WHERE sessionID NOT IN (SELECT sessionID FROM enrollsession WHERE participant = '$user') AND type = 'Group' AND status ='Available'");
		if (mysqli_num_rows($array)==0){
			echo "		<div class='paper'>
			<div class='header'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;There are no sessions available.</div></div>";
		}
        while ($row = mysqli_fetch_row($array)){

        $query = "SELECT name,specialty FROM users WHERE userName = '$row[7]'";
        $results = mysqli_query($mysqli, $query);
        $row2 = mysqli_fetch_assoc($results);
		$fullname =  $row2['name'];
		$specialty = $row2['specialty'];

		echo "
		<div class='paper'>
		<div class='header'><span class='date'>$row[2]</span>$row[1]<i class='fa fa-chevron-down' aria-hidden='true'></i></div>
			<div class='content'>
			<div class='row'>
			<div class='col-md-5'>
			<div class='contenticon'><i class='fa fa-calendar' aria-hidden='true'></i></div>
			<div class='contentbody'><b>Date</b><br/>$row[2]<br/>$row[3]</div><br/>
			<div class='contenticon'><i class='fa fa-user-circle-o' aria-hidden='true'></i></div>
			<div class='contentbody'><b>Trainer</b><br/>$fullname</div><br/>
			<div class='contenticon'><i class='fa fa-star' aria-hidden='true'></i></div>
			<div class='contentbody'><b>Trainer Specialty</b><br/>$specialty</div><br/>
		</div>
		<div class='col-md-5'>
			<div class='contenticon'><i class='fa fa-usd' aria-hidden='true'></i></div>
			<div class='contentbody'><b>Fee</b><br/>RM $row[4]</div><br/>
			<div class='contenticon'><i class='fa fa-spinner' aria-hidden='true'></i></div>
			<div class='contentbody'><b>Status</b><br/>$row[9]</div><br/>
			<div class='contenticon'><i class='fa fa-tags' aria-hidden='true'></i></div>
			<div class='contentbody'><b>Class Type</b><br/>$row[8]<br/>$row[6]</div><br/>
		</div>
		</div>
		<form method='POST' action='registerM.php'>
		<input type='text' class='hide' name='sessionID' value='$row[0]'>
		<button type='submit' name='enroll' class='btn btn-orange col-md-12'>Enroll Session</button>
		</form>
		</div></div>";
		}
	?>
</div>
</div>
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
