<?php
include_once('connection/connect.php');

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $record = mysqli_query($con, "SELECT * FROM restuarant WHERE ID=$id");

    $n = mysqli_fetch_array($record);
    $name = $n['name'];
    $disc = $n['description'];
    $img = $n['pic'];
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Maju Task 1</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

    <section class="head">
        <nav class="navbar navbar-expand-lg navbar-dark  bg-dark ">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a class="navbar-brand" href="Index.php"><img src="images/logo-removebg-preview.png" height="70px" alt=""></a>
        </nav>


    </section>


    <section class="body">
        <br><br>
        <h3 class="text-center"><?php echo $name; ?></h3>
        <br><br>
        <div class="container">
            <div class="jumbotron">
                <img src="<?php echo 'webimg/' . $img ?>" width="100%">
            </div>
            <br>
            <p class="text-center"><?php echo $disc; ?></p>
            <p class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Write a review</p>
        </div>


    </section>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Write a review</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Name:</label>
            <input type="text" name="res" class="form-control" readonly value="<?php if (isset($_SESSION['first'])) echo $_SESSION['first']; ?>" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Review:</label>
            <textarea class="form-control" name="rew" id="message-text"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="add" class="btn btn-primary">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>

</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<?php
if (isset($_POST['add'])) {
    $nam= $_POST['res'];
    $disc = $_POST['rew'];

    mysqli_query($con, "INSERT INTO review VALUES ('','$nam','$disc','$id')");

    header("Location: index.php");
}   
?>