<?php
  session_start();
 ?>
 <?php include('updateSession.php') ?>
  <?php include('review.php') ?>

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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="review.js"></script>
  <title>FitNest - Reviews</title>

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
            <a class="dropdown-item" href="historyM.php">Traning History</a>
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
	 <h22>Read Reviews</h22><br/>
	 <p>Trainees have left ratings and feedbacks on your session</p>
</div>
</div>
</header>

<div class="container">
<?php
  $mysqli = new mysqli("localhost","root","","a2");
  $id = $_SESSION['id'];
  $count = mysqli_query($mysqli, "SELECT sum(rating) / count(rating) FROM review WHERE reviewedUsername = '$user'");
  $row = mysqli_fetch_assoc($count);
  $average = $row['sum(rating) / count(rating)'];


?>
    <?php
	$title = mysqli_query($mysqli, "SELECT title FROM trainingsession WHERE sessionID = '$id'");
	$title = mysqli_fetch_assoc($title);
	  echo"<h3>". $title['title'] . "</h3><br/>";
	  echo "<h4>Trainer average rating: ". number_format($average,2,'.',','). "</h4><br/><br/>  <div class='row'>";
      $mysqli = new mysqli("localhost","root","","a2");
      $user = $_SESSION['username'];
    	$array = mysqli_query($mysqli, "SELECT * FROM review
                                      WHERE reviewedUsername = '$user' AND sessionID = '$id'");
    	if (mysqli_num_rows($array)==0){
    		echo "<div class='papercard'><div class='paper'>
    		<div class='header'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;You have no review yet.</div></div></div>";
    	}
    	while ($row = mysqli_fetch_row($array)){
    		$query = "SELECT name,specialty FROM users WHERE userName = '$row[0]'";
    		$results = mysqli_query($mysqli, $query);
    		$row2 = mysqli_fetch_assoc($results);
    		$fullname =  $row2['name'];
    		$specialty = $row2['specialty'];


        $rating = $row[2];

          echo "
          <div class='col-md-6'>
      		  <div class='trainerdesc'>
      		  <img src='image/user.jpg' class='img-circle' alt='trainer-photo' width='100' height='100'>
      			<h4>$fullname</h4>
      			Date Reviewed: $row[5] <br/>
      			<br/><br/>
      			</div>
      		<div class='group'>
      		<label class='field'>Rating</label><br/><br/>
                <div class='stars'>
      		  <form action=''>
      			<input class='star star-5' id='star-5' type='radio' name='star'"; if ($rating == 5) echo"checked"; echo" disabled/>
      			<label class='star star-5' for='star-5'></label>
      			<input class='star star-4' id='star-4' type='radio' name='star'"; if ($rating == 4) echo"checked"; echo" disabled/>
      			<label class='star star-4' for='star-4'></label>
      			<input class='star star-3' id='star-3' type='radio' name='star'"; if ($rating == 3) echo"checked"; echo" disabled/>
      			<label class='star star-3' for='star-3'></label>
      			<input class='star star-2' id='star-2' type='radio' name='star'"; if ($rating == 2) echo"checked"; echo" disabled/>
      			<label class='star star-2' for='star-2'></label>
      			<input class='star star-1' id='star-1' type='radio' name='star'"; if ($rating == 1) echo"checked"; echo" disabled/>
      			<label class='star star-1' for='star-1'></label>
      		  </form>
      		</div>
              </div>
      		<div class='group'>
                <textarea rows='3' disabled>$row[3]</textarea><span class='highlight'></span><span class='bar'></span>
      		  <label class='field'>Comment</label>
              </div>
      		<br>
          </div>";
      }
        ?>	
</div>
<div class="group">
			  <a href="historyT.php" class="btn btn-orange btn-md">Back</a>
        </div>
</div>

</div>

<br><br>
<footer>
<div class="container-fluid">

		<p>FitNest</p>
		<footer2>Copyright 2017</footer2>

</div>
</footer>
<body>



<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

<script src="panelscript.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>
