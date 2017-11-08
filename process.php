<?php

session_start();

  $userame = "";
  $email = "";
  $error = array();
  $_SESSION['success'] = "";

  $mysqli = new mysqli("localhost", "root", "", "a2");

//login// LOGIN USER
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($mysqli, $_POST['username']);
		$password = mysqli_real_escape_string($mysqli, $_POST['password']);

    $query = "SELECT password FROM users WHERE username = '$username'";
    $result = mysqli_query($mysqli,$query);
    $row = mysqli_fetch_assoc($result);
    $userPw = $row['password'];

    if($password != $userPw){
      array_push($error, "Wrong Password");
    }

		if (empty($username)) {
			array_push($error, "Username is required");
		}
		if (empty($password)) {
			array_push($error, "Password is required");
		}

		if (count($error) == 0) {
			$query = "SELECT * FROM Users WHERE username='$username'";
			$results = mysqli_query($mysqli, $query);

			if (mysqli_num_rows($results) == 1) {
        $query2 = "SELECT type FROM Users WHERE username='$username'";
        $result2 = mysqli_query($mysqli,$query2);
        $row = mysqli_fetch_assoc($result2);
        $check = $row['type'];


        if($check == 'Trainer'){
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You're Logged in";
            header('Location: loginT.php');
        }
        elseif($check == 'Member'){
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You're Logged in";
            header('Location: loginM.php');
            echo $_SESSION['success'];
        }
		//		$_SESSION['username'] = $username;
		//		$_SESSION['success'] = "You are now logged in";
		//		header('location: index.php');
			} else {
				array_push($error, "Wrong username/password combination");
			}
		}
	}


 ?>
