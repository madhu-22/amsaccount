<?php include("amsdb.php"); ?>

<?php include('amsheader.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="amssave_task.php" method="POST">
          <div class="form-group">
            <input type="text" name="region" class="form-control" placeholder="Region" autofocus>
          </div>
          <div class="form-group">
            <textarea name="accountname" rows="2" class="form-control" placeholder="Account Name"></textarea>
          </div>          <input type="submit" name="amssave_task" class="btn btn-success btn-block" value="Add Account">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Region</th>
            <th>Account Name</th>
            <th>Created At</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM amsaccount";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['region']; ?></td>
            <td><?php echo $row['accountname']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td>
              <a href="amsedit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="amsdelete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('amsfooter.php'); ?>

