<!-- Update Session -->
<?php

$mysqli = new mysqli("localhost","root","","a2");

if (isset($_POST['updateSession'])) {
  $id = $_POST['sessionID'];
  $sql = "SELECT type FROM trainingSession WHERE sessionID='$id'";
  $result = mysqli_query($mysqli,$sql);
  $row = mysqli_fetch_assoc($result);
  $check = $row['type'];
  $_SESSION['id'] = "";

  if($check == 'Personal'){
      $_SESSION['id'] = $id;
      header('Location: updateSessionP.php');
  }
  elseif($check == 'Group'){
      $_SESSION['id'] = $id;
      header('Location: updateSessionG.php');
  }
}

$error = "";

if (isset($_POST['updateP'])) {
  $date = $_POST['date'];
  $time = $_POST['time'];;
  $fee = $_POST['fee'];
  $status = $_POST['status'];
  $notes = htmlspecialchars($_POST['notes']);

  if(!$_POST['date']){
    $error .= "Date Required<br>";
  }
  if(!$_POST['time']){
    $error .= "Time Required<br>";
  }
  if(!$_POST['fee']){
    $error .= "Fee Required<br>";
  }
  if(!$_POST['notes']){
    $notes = "";
  }
  if($error != ""){
    $error = "<p>There was error(s) in your form:</p>".$error;
  } else {
    $id = $_SESSION['id'];
    $sql = "UPDATE trainingSession
            SET date = '$date',
                time = '$time',
                fee  = '$fee',
                status = '$status',
				notes = '$notes'
            WHERE sessionID = '$id'";
    mysqli_query($mysqli,$sql);
    $_SESSION['success'] = "Update Successful";
    header('Location: historyT.php');
  }
}
elseif (isset($_POST['updateG'])) {
  $date = $_POST['date'];
  $time = $_POST['time'];
  $fee = $_POST['fee'];
  $status = $_POST['status'];
  $classtype = $_POST['classtype'];

  if(!$_POST['date']){
    $error .= "Date Required<br>";
  }
  if(!$_POST['time']){
    $error .= "Time Required<br>";
  }
  if(!$_POST['fee']){
    $error .= "Fee Required<br>";
  }
  if($error != ""){
    $error = "<p>There was error(s) in your form:</p>".$error;
  } else {
    $id = $_SESSION['id'];
    $sql = "UPDATE `trainingSession`
            SET date = '$date',
                time = '$time',
                fee  = '$fee',
                status = '$status',
				classtype = '$classtype'
            WHERE sessionID = '$id'";
    mysqli_query($mysqli,$sql);
    $_SESSION['success'] = "Update Successful";
    header('Location: historyT.php');
  }
}
?>
