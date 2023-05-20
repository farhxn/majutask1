<?php
include_once('../connection/connect.php')
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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-dark">
            <div class="container">
                <a class="navbar-brand" href="Index.php"><img src="../images/logo-removebg-preview.png" height="70px" alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">

                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Restaurants List</a>
                        </li>&nbsp;&nbsp;
                        <li class="nav-item">
                            <p class="nav-link text-white " data-bs-toggle="modal" data-bs-target="#exampleModal">Add Restaurants</p>
                        </li>&nbsp;&nbsp;
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Restaurants</a>
                        </li>&nbsp;&nbsp;
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#">Restaurants</a>
                        </li>&nbsp;&nbsp;
                    </ul>

                </div>
            </div>
        </nav>



    </section>


    <section class="body">
        <br><br>
        <h3 class="text-center">Trending Restaurants</h3>
        <br><br>
        <div class="container">

        <div class="row">
                <?php
                $results = mysqli_query($con, "SELECT * FROM restuarant");
                $res = mysqli_fetch_all($results, MYSQLI_ASSOC);

                foreach ($res as $usr) : ?>
                    <div class="col-4">
                        <div class="card" style="width: 18rem;">
                            <img src="<?php echo '../webimg/' . $usr['pic'] ?>" class="card-img-top" alt="Card Image">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?php echo $usr['r_name'] ?>
                                </h5>
                                <p class="card-text"><?php echo $usr['description'] ?>.</p>
                                <a href="restuaranat-detail.php?edit=<?php echo $usr['ID']; ?>" class="btn btn-success">Write a review</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="body">
        <br><br>
        <h3 class="text-center">Recent Reviews</h3>
        <br><br>
        <div class="container">

            <div class="row">
                <?php
                $results = mysqli_query($con, "SELECT review.*, restuarant.* FROM review INNER JOIN restuarant ON review.res_id=restuarant.ID;");
                $res = mysqli_fetch_all($results, MYSQLI_ASSOC);
                foreach ($res as $usr) : ?>
                    <div class="col-4">
                        <div class="card" style="width: 18rem;">
                            <div class="card-header d-flex align-items-center">
                                <h5 class="title"><?php echo $usr['name'] ?></h5>
                            </div>
                            <img src="<?php echo '../webimg/' . $usr['pic'] ?>" class="card-img-top" alt="Card Image">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?php echo $usr['r_name'] ?>

                                </h5>
                                <p class="card-text"><?php echo $usr['review'] ?>.</p>

                            </div>
                        </div>
                        <br>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>


    </section>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Restaurant</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Name:</label>
            <input type="text" name="res" class="form-control" id="recipient-name">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Image:</label>
            <input type="file" accept="image/*" required name="img" class="form-control file-upload-info" placeholder="Upload Image">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Description:</label>
            <textarea class="form-control" name="descrip" id="message-text"></textarea>
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
    $disc = $_POST['descrip'];

    $img = time() . '-' . $_FILES["img"]["name"];
    $target_dir = "../webimg/";
    $target_file = $target_dir . basename($img);
    move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);

    mysqli_query($con, "INSERT INTO restuarant(`ID`, `name`, `description`, `pic`) VALUES ('','$nam','$disc','$img')");
}
?>