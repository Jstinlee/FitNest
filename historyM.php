<?php
  session_start();
 ?>
 <?php include('review.php');
    if (isset($_POST['dropSession'])){
	  $id = $_POST['sessionID'];
	  mysqli_query($mysqli, "DELETE FROM enrollsession WHERE sessionID = '$id'");
	  $_SESSION['success'] = "You have successfully dropped the session";} ?>

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
  <title>FitNest - Training History</title>

</head>

<body>
<div class="notification">
<?php
	echo $_SESSION['success'];
	$_SESSION['success'] = "";?></div>
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
	 <h22>Training History</h22>
	<p>View your ongoing and completed training sessions. Don't forget to give some feedbacks on your trainer(s)</p>
</div>
</div>
</header>

<div class="container">
<div class="row">
	<h3>Ongoing Training Sessions</h3>
	<div class="papercard">
		<?php
  $mysqli = new mysqli("localhost","root","","a2");
	$array = mysqli_query($mysqli, "SELECT * FROM trainingSession WHERE sessionID IN (SELECT sessionID FROM enrollsession WHERE participant = '$user') AND (status = 'Available' OR status = 'Full')");
	if (mysqli_num_rows($array)==0){
		echo "		<div class='paper'>
		<div class='header'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;You have no ongoing sessions.</div></div>";
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
		<div class='contentbody'><b>Trainer Specialty</b><br/>$specialty</div><br/>		</div><div class='col-md-5'>
		<div class='contenticon'><i class='fa fa-usd' aria-hidden='true'></i></div>
		<div class='contentbody'><b>Fee</b><br/>RM $row[4]</div><br/>
		<div class='contenticon'><i class='fa fa-spinner' aria-hidden='true'></i></div>
		<div class='contentbody'><b>Status</b><br/>$row[9]</div><br/>
		<div class='contenticon'><i class='fa fa-tags' aria-hidden='true'></i></div>
		<div class='contentbody'><b>Class Type</b><br/>$row[8]<br/>$row[6]</div><br/></div></div>
    <form method='POST' action='" . htmlspecialchars($_SERVER['PHP_SELF']). "'>
    <input type='text' class='hide' name='sessionID' value='$row[0]'>
    <button type='submit' name='dropSession' class='btn btn-orange col-md-12'>Drop Session</button></div>
    </form>
		</div>
    ";
  }
    ?>
	</div>
	<h3>Completed Training Sessions</h3>
	<div class="papercard">
		<?php
  $mysqli = new mysqli("localhost","root","","a2");
  $user = $_SESSION['username'];
	$array = mysqli_query($mysqli, "SELECT * FROM trainingSession WHERE sessionID IN (SELECT sessionID FROM enrollsession WHERE participant = '$user') AND (status = 'Completed' OR status = 'Cancelled')");
	if (mysqli_num_rows($array)==0){
		echo "		<div class='paper'>
		<div class='header'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;You have no completed sessions.</div></div>";
	}
	while ($row = mysqli_fetch_row($array)){
		$query = "SELECT name,specialty FROM users WHERE userName = '$row[7]'";
		$results = mysqli_query($mysqli, $query);
		$row2 = mysqli_fetch_assoc($results);
		$name =  $row2['name'];
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
		<div class='contentbody'><b>Trainer</b><br/>$name</div><br/>
		<div class='contenticon'><i class='fa fa-star' aria-hidden='true'></i></div>
		<div class='contentbody'><b>Trainer Specialty</b><br/>$specialty</div><br/>		</div><div class='col-md-5'>
		<div class='contenticon'><i class='fa fa-usd' aria-hidden='true'></i></div>
		<div class='contentbody'><b>Fee</b><br/>RM $row[4]</div><br/>
		<div class='contenticon'><i class='fa fa-spinner' aria-hidden='true'></i></div>
		<div class='contentbody'><b>Status</b><br/>$row[9]</div><br/>
		<div class='contenticon'><i class='fa fa-tags' aria-hidden='true'></i></div>
		<div class='contentbody'><b>Class Type</b><br/>$row[8]<br/>$row[6]</div><br/></div></div>
    <form method='POST' action='historyM.php'>
    <input type='text' class='hide' name='sessionID' value='$row[0]'>";
	$query = "SELECT * FROM review WHERE reviewerUsername = '$user' AND sessionID = '$row[0]'";
	$id = $row[0];
	$result = mysqli_query($mysqli, $query);
	$row = mysqli_fetch_assoc($result);
	$theID = $row['sessionID'];
	$theUser = $row['reviewerUsername'];
	if ($user == $theUser && $id == $theID){
		echo "<button type='submit' name='reviewT' class='btn btn-orange col-md-12' disabled>Reviewed</button></div>";}
	else{
		echo "<button type='submit' name='reviewT' class='btn btn-orange col-md-12'>Write Review</button></div>";}
    echo"</form>
		</div>
    ";
  }
    ?>
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
