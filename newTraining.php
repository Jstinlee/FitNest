<?php
  session_start();
 ?>
 <?php include('trainingProcess.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <link rel = "icon" type = "image/png" href= "image/icon.png">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Six+Caps" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Asap+Condensed" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="panelstyle.css">
  <title>FitNest - Create New Training Session</title>
</head>

<body>
<header>
<nav class="navbar navbar-toggleable-md navbar-inverse nav">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a href="loginT.php">FitNest</a>
	<div class="offset-sm-5"></div>
    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle nav3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Account</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="editProfileT.php">Edit Profile</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="logout.php?logout=1">Log Out</a>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle nav3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Training</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="newTraining.php">Create New Training Session</a>
			<div class="dropdown-divider"></div>
            <a class="dropdown-item" href="historyT.php">Training History</a>
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
  </nav>

 <div class="jumbotron">
    <div class="container">

  <h22>Create New Training Session</h22>
  <p>Create a new personal or group training session</p>
  <div class="error">
    <?php echo $error; ?>
  </div>

    </div>
  </div>
</header>
<div class="error">
</div>

<div class="container">
<h3>New Training Session</h3><br/><br/>
  <button class="tabtitle col-md-3" onclick="swapTab(event, 'personal')" id="default">Personal</button>
  <button class="tabtitle col-md-3" onclick="swapTab(event, 'group')">Group</button>
<br/><br/><br/>
  <div class="row">
	<div class="tabcontent col-md-6" id="personal">
	<form method="POST" action="newTraining.php">
		<div class="group">
          <input type="text" name="titleP" required/><span class="highlight"></span><span class="bar"></span>
		  <label class="field">Title</label>
        </div>
		<div class="group">
          <input type="date" name="dateP" required/><span class="highlight"></span><span class="bar"></span>
		  <label class="field">Date</label>
        </div>
		<div class="group">
          <input type="time" name="timeP" required/><span class="highlight"></span><span class="bar"></span>
		  <label class="field">Time</label>
        </div>
		<div class="group">
          <input type="text" name="feeP" required/><span class="highlight"></span><span class="bar"></span>
		  <label class="field">Fee</label>
        </div>
		<div class="group">
              <button type="submit" name="personal" class="btn btn-orange col-md-12">Create New Session</button>
        </div>
	</form>
	</div>
	
	<div class="tabcontent col-md-6" id="group">
	<form method="POST" action="newTraining.php">
		<div class="group">
          <input type="text" name="titleG" required/><span class="highlight"></span><span class="bar"></span>
		  <label class="field">Title</label>
        </div>
		<div class="group">
          <input type="date" name="dateG" required/><span class="highlight"></span><span class="bar"></span>
		  <label class="field">Date</label>
        </div>
		<div class="group">
          <input type="time" name="timeG" required/><span class="highlight"></span><span class="bar"></span>
		  <label class="field">Time</label>
        </div>
		<div class="group">
          <input type="text" name="feeG" required/><span class="highlight"></span><span class="bar"></span>
		  <label class="field">Fee</label>
        </div>
		<div class="group">
		 <label class="field">Maximum Number of Participants:</label><br/><br/>
		  <select name="max" class="col-md-12">
		  <option>10</option>
		  <option>20</option>
		  <option>30</option>
		  <option>40</option>
		  <option>50</option>
		  </select>
        </div>
		<div class="group">
		 <label class="field">Class Type:</label><br/><br/>
		  <select name="classType" class="col-md-12">
		  <option>Sport</option>
		  <option>Dance</option>
		  <option>MMA</option>
		  </select>
        </div>
		<div class="group">
              <button type="submit" name="group" class="btn btn-orange col-md-12">Create New Session</button>
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
