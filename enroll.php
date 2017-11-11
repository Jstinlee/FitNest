<?php

$mysqli = new mysqli("localhost","root","","a2");


if (isset($_POST['enroll'])) {
  $id = $_POST['sessionID'];
  $participant =  $_SESSION['username'];

  $sql = "INSERT INTO  enrollSession (sessionID,participant)
          VALUES ('$id','$participant')";
  mysqli_query($mysqli,$sql);
  $_SESSION['success'] = "You have successfully enrolled in the session.";
  $sql2 = "SELECT count(*) AS noOfParticipant FROM enrollSession WHERE sessionID = '$id'";
  $result = mysqli_query($mysqli, $sql2);
  $row = mysqli_fetch_assoc($result);
  $noOfparticipant = $row['noOfParticipant'];
  $sql3 = "SELECT max FROM trainingsession WHERE sessionID = '$id'";
  $result3 = mysqli_query($mysqli, $sql3);
  $row3 = mysqli_fetch_assoc($result3);
  $maxParticipant = $row3['max'];
  if ($noOfparticipant == $maxParticipant){
	  $sql = "UPDATE trainingsession SET status = 'Full' WHERE sessionID = '$id'";
	  mysqli_query($mysqli, $sql);
  }
  header('location: loginM.php');
}

?>
