<?php

include('amsdb.php');

if (isset($_POST['amssave_task'])) {
  $region = $_POST['region'];
  $accountname = $_POST['accountname'];
  $query = "INSERT INTO amsaccount(region, accountname) VALUES ('$region', '$accountname')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Task Saved Successfully';
  $_SESSION['message_type'] = 'success';
  header('Location: amsindex.php');

}

?>
