<?php
include_once('connection/connect.php')
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

    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a class="navbar-brand" href="Index.php"><img src="images/logo-removebg-preview.png" height="70px" alt=""></a>
    </nav>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-6 text-center mt-5">
                <h5>Sign Up To Yelp</h5>
                <p class="text-dark"><strong> Connect with great local businesses</strong></p>
                <small>By continuing, you agree to Yelp’s Terms of Service and <br> <span>acknowledge Yelp’s Privacy Policy.</span></small>
                <p><span>
                        <hr>
                    </span></p>
                <form method="post" style="width: 300px; margin: 0 auto;">
                    <div class="mb-3 row">
                        <div class="col-sm-6">
                            <input type="text" name="first" class="form-control" required placeholder="First Name">
                        </div>
                        <div class="col-sm-6">
                            <input type="text" name="last" class="form-control" required placeholder="Last Name">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-sm-12">
                            <input type="email" name="mail" class="form-control" required placeholder="Email">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-sm-12">
                            <input type="password" name="password" class="form-control" required placeholder="Password">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-sm-12">
                            <input type="text" name="zip" class="form-control" required placeholder="Zip Code">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-sm-12">
                            <select name="role" class="form-control">
                                <option selected disabled>Select : Are You signing as a Restaurant</option>
                                <option value="1">Yes</option>
                                <option value="2">No</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <div class="col-sm-12">
                            <input type="submit" name="submit" class="form-control btn btn-danger" required value="Sign Up">
                        </div>
                    </div>
                </form>
                <small class="ms-auto">Already on yelp?&nbsp;<a href="login.php">Log in</a></small>

            </div>


            <div class="col-6 d-flex justify-content-center">
                <img src="images/login.png" class="img-fluid" alt="">
            </div>

        </div>
    </div>


</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<?php
    if (isset($_POST['submit'])) {
        $first = $_POST['first'];
        $last = $_POST['last'];
        $mail = $_POST['mail'];
        $password = $_POST['password'];
        $zip = $_POST['zip'];
        $role = $_POST['role'];
        mysqli_query($con, "INSERT INTO user VALUES ('','$first','$last','$mail','$password','$zip','$role')");
    }
?>