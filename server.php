<?php
  session_start();

  $userNameT = "";
  $emailT = "";
  $error = array();
  $_SESSION['success'] = "";

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
 $mysqli = new mysqli("localhost", "root", "", "a2");

// Check connection

//$userNameT=$_POST['userNameT'];
//$passwordT=$_POST['passwordT'];
//$name=$_POST['name'];
//$emailT=$_POST['emailT'];
//$specialty=$_POST['specialty'];
// Escape user inputs for security
//$sql = "INSERT INTO  Trainer (userName,password,fullName,email,specialty)
//        VALUES ('$userNameT','$passwordT','$name','$emailT','$specialty')";
//mysqli_query($mysqli, $sql);
//mysqli_close($mysqli);
if (isset($_POST['registerT'])) {
  # code...
  $userNameT = mysql_real_escape_string($_POST['userNameT']);
  $passwordT = mysql_real_escape_string($_POST['passwordT']);
  $name = mysql_real_escape_string($_POST['name']);
  $emailT = mysql_real_escape_string($_POST['emailT']);
  $specialty = mysql_real_escape_string($_POST['specialty']);

  if(empty($userNameT)){
    array_push($error,"Username is required.");
  }
  if(empty($passwordT)){
    array_push($error,"Password is required.");
  }
  if(empty($emailT)){
    array_push($error,"Email is required.");
  }

  if(count($error)==0){
    $sql = "INSERT INTO  Trainer (userName,password,fullName,email,specialty)
            VALUES ('$userNameT','$passwordT','$name','$emailT','$specialty')";
    mysqli_query($mysqli,$sql);
    $_SESSION['userNameT'] = $userNameT;
    $_SESSION['success'] = "You are now logged in";
    header('location: loginT.php');
  }
}
?>
<?php
  if(isset($_POST['login_user'])){
    $username = mysqli_real_escape_string($mysqli, $_POST['username']);
    $password = mysqli_real_escape_string($mysqli, $_POST['password']);

    if(empty($username)){
      array_push($error,"Username is required");
    }
    if(empty($password)){
      array_push($error,"Password is required");
    }
    if(count($error) == 0){
      $password = md5($password);
      $query = "SELECT * FROM `Trainer` WHERE username = '$username' AND password= '$password'";
      $results = mysqli_query($mysqli,$query);

      if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: loginT.php');
			}else {
				array_push($error, "Wrong username/password combination");
			}
    }
  }
  ?>

<?php  if (count($error) > 0) : ?>
	<div class="error">
		<?php foreach ($error as $errors) : ?>
			<p><?php echo $errors ?></p>
		<?php endforeach ?>
	</div>
<?php  endif ?>
