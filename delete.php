<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php
        include("asset/connect.php");
        if(isset($_POST['submit'])){
            $email = $_POST['email'];
            $password = $_POST['password'];

            $select = "SELECT * FROM `singhup2`";
            $qry = mysqli_query($connection,$select);
            while($row=mysqli_fetch_array($qry)){
                if($row['email'] == $email && $row['password'] == $password){
                    $delete = "DELETE FROM `singhup2` WHERE `email`=
                    '$email'";
                    $qry1 = mysqli_query($connection,$delete);
                    if($qry1){
                        echo "Data deleted";
                    }else{
                        echo "data deletetion failed";
                    }
                
                }
            }

        }
    ?>
    <div class="container-fluid">
        <div class="container">
            <a href="home.php">home</a>
            <a href="profile.php">profile</a>
            <a href="update.php">Update</a>
            
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                </div>
                <input type="submit" name="submit" value="submit" class="btn btn-primary">
            </form>
        </div>
    </div>
</body>
</html>