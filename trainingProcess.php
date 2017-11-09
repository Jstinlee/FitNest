<?php

$error = "";
$mysqli = new mysqli("localhost","root","","a2");

$user = $_SESSION['username'];

if (isset($_POST['personal'])) {
  $titleP = $_POST['titleP'];
  $dateP = $_POST['dateP'];
  $timeP = $_POST['timeP'];
  $feeP = $_POST['feeP'];
  $max = "";
  $classType = "";
  $user = $_SESSION['username'];
  $type = "Personal";
  $status = "Available";
  $notes = "";

  if(!$_POST['titleP']){
    $error .= "Title Required<br>";
  }
  if(!$_POST['dateP']){
    $error .= "Date Required<br>";
  }
  if(!$_POST['timeP']){
    $error .= "Time Required<br>";
  }
  if(!$_POST['feeP']){
    $error .= "Fee Required<br>";
  }
  if($error != ""){
    $error = "<p>There was error(s) in your form:</p>".$error;
  } else {
    $sql = "INSERT INTO  trainingSession (title,date,time,fee,max,classType,username,type,status,notes)
            VALUES ('$titleP','$dateP','$timeP','$feeP','$max','$classType','$user','$type','$status','$notes')";
    mysqli_query($mysqli,$sql);
	$_SESSION['success'] = "New personal session has been successfully created.";
    header('location: historyT.php');
  }
}
elseif (isset($_POST['group'])) {
  # code...
  $titleG = $_POST['titleG'];
  $dateG = $_POST['dateG'];
  $timeG = $_POST['timeG'];
  $feeG = $_POST['feeG'];
  $max = $_POST['max'];
  $classType = $_POST['classType'];
  $user = $_SESSION['username'];
  $type = "Group";
  $status = "Available";

  if(!$_POST['titleG']){
    $error .= "Title Required<br>";
  }
  if(!$_POST['dateG']){
    $error .= "Date Required<br>";
  }
  if(!$_POST['timeG']){
    $error .= "Time Required<br>";
  }
  if(!$_POST['feeG']){
    $error .= "Fee Required<br>";
  }
  if($error != ""){
    $error = "<p>There was error(s) in your form:</p>".$error;
  } else {
    $sql = "INSERT INTO  trainingSession (title,date,time,fee,max,classType,username,type,status)
            VALUES ('$titleG','$dateG','$timeG','$feeG','$max','$classType','$user','$type','$status')";
    mysqli_query($mysqli,$sql);
	$_SESSION['success'] = "New group session has been susccessfully created.";
    header('location: historyT.php');
  }
}
?>