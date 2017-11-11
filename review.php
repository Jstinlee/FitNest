<?php

$mysqli = new mysqli("localhost","root","","a2");

if (isset($_POST['reviewT'])) {
  $id = $_POST['sessionID'];
  $_SESSION['id'] = $id;
  header('Location: reviewSite.php');
  }

if(isset($_POST['reviewed'])){
  $rating = $_POST['star'];
  $comment = $_POST['comment'];
  $id = $_SESSION['id']
  $reviewer = $_SESSION['username'];
  $sql = "SELECT users.userName FROM users,trainingSession
          WHERE users.username = trainingSession.username
          AND sessionID = $id";
  $result = mysqli_query($mysqli, $sql);
  $row = mysqli_fetch_assoc($result);
  $reviewed =  $row['userName']

  $sql2 =  "INSERT INTO review(reviewerUsername,reviewedUsername,rating,comment,sessionID)
            VALUES ('$reviewer','$reviewed',$rating,'$comment',$id)";
  $result2 = mysqli_query($mysqli,$sql2);

  $_SESSION['success'] = "Review Submitted !";
  header('Location: historyM.php');
}
?>
<?php

$mysqli = new mysqli("localhost","root","","a2");

if (isset($_POST['readReview'])) {
  $id = $_POST['sessionID'];
  $_SESSION['id'] = $id;
  header('Location: readReview.php');
}
?>
