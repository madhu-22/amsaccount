<?php
include("amsdb.php");
$region = '';
$accountname= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM amsaccount WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $region = $row['region'];
    $accountname = $row['accountname'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $region= $_POST['region'];
  $accountname = $_POST['accountname'];

  $query = "UPDATE amsaccount set region = '$region', accountname = '$accountname' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Task Updated Successfully';
  $_SESSION['message_type'] = 'warning';
  header('Location: amsindex.php');
}

?>
<?php include('amsheader.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="amsedit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="region" type="text" class="form-control" value="<?php echo $region; ?>" placeholder="Update Region">
        </div>
        <div class="form-group">
        <textarea name="accountname" class="form-control" cols="30" rows="10"><?php echo $accountname;?></textarea>
        </div>
        <button class="btn-success" name="update">
          Update
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('amsfooter.php'); ?>
