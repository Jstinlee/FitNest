<?php
  session_start();
 ?>
 <?php include('updateSession.php') ?>
<?php
$user = $_SESSION['username'];
$id = $_SESSION['id'];
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
  <title>FitNest - Update Personal Training Session</title>
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
            <a class="dropdown-item" href="historyT.php">Traning History</a>
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

  <h22>Update Personal Training Session</h22>
  <p>Update your training session information</p>

    </div>
  </div>
</header>

<div class="container">
  <div class="row">
	<div class="tabcontent col-md-6">
	<form method="POST" action="updateSessionP.php">
		<div class="group">
          <input type="text" name="title" value= "<?php
          $query = "SELECT title FROM trainingSession WHERE sessionID = '$id'";
          $result = mysqli_query($mysqli,$query);
          $row = mysqli_fetch_assoc($result);
          echo $row['title'];?>"
            disabled><span class="highlight"></span><span class="bar"></span>
		  <label class="field">Title</label>
        </div>
		<div class="group">
          <input type="date" name="date" value="<?php
          $query = "SELECT date FROM trainingSession WHERE sessionID = '$id'";
          $result = mysqli_query($mysqli,$query);
          $row = mysqli_fetch_assoc($result);
          echo $row['date'];?>"
          ><span class="highlight"></span><span class="bar"></span>
		  <label class="field">Date</label>
        </div>
		<div class="group">
          <input type="text" name="time" value="<?php
          $query = "SELECT time FROM trainingSession WHERE sessionID = '$id'";
          $result = mysqli_query($mysqli,$query);
          $row = mysqli_fetch_assoc($result);
          echo $row['time'];?>"
          ><span class="highlight"></span><span class="bar"></span>
		  <label class="field">Time</label>
        </div>
		<div class="group">
          <input type="text" name="fee" value="<?php
          $query = "SELECT fee FROM trainingSession WHERE sessionID = '$id'";
          $result = mysqli_query($mysqli,$query);
          $row = mysqli_fetch_assoc($result);
          echo $row['fee'];?>"
          ><span class="highlight"></span><span class="bar"></span>
		  <label class="field">Fee</label>
        </div>
		<div class="group">
		 <label class="field">Status</label><br/><br/>
		 <?php $query = "SELECT status FROM trainingSession WHERE sessionID = '$id'";
		 $result = mysqli_query($mysqli, $query);
		 $row = mysqli_fetch_assoc($result);?>
		  <select name="status" class="col-md-12">
		  <option value="Available" <?php if ($row['status'] == 'Available') echo "selected='selected'"?>>Available</option>
		  <option value="Completed" <?php if ($row['status'] == 'Completed') echo "selected='selected'"?>>Completed</option>
		  <option value="Cancelled" <?php if ($row['status'] == 'Cancelled') echo "selected='selected'"?>>Cancelled</option>
		  </select>
        </div>
		<div class="group">
		 <?php $query = "SELECT notes FROM trainingSession WHERE sessionID = '$id'";
		 $result = mysqli_query($mysqli, $query);
		 $row = mysqli_fetch_assoc($result);?>
          <textarea name="notes"><?php echo $row['notes']?></textarea><span class="highlight"></span><span class="bar"></span>
		  <label class="field">Notes</label>
        </div>
		<div class="group">
              <button type="submit" name="updateP" class="btn btn-orange col-md-12">Update Changes</button>
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
