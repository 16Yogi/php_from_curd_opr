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
        
        // if(isset($_POST['submit'])){
           
        //     $select = "SELECT * FROM `singhup2`";
        //     $result = mysqli_query($connection,$select);
        //     // while($row=mysqli_fetch_array($result)){
        //         $email = $row['email'];
        //         $password = $row['password'];

        //         // echo $email,$password;

        //         $upemail = $_POST['email'];
        //         $upoldpass = $_POST['oldpassword'];
        //         $upnewpass = $_POST['newpassword'];    
        //         if($upoldpass == $password){
        //             $update = "UPDATE SET `password`='$upnewpass',`cpassword`='$upnewpass' WHERE `email`='$upemail'";
        //             $update_result = mysqli_query($connection,$update);
        //             if($update_result){
        //                 echo "Data successfully updated";
        //             }else{
        //                 echo "Data not updated";
        //             }
        //         }else{
        //             echo "old password not matched";
        //         }
        //     // }
        // }else{
        //     echo "Click failed";
        // }




        if (isset($_POST['submit'])) {
            $upemail = $_POST['email'];
            $upoldpass = $_POST['oldpassword'];
            $upnewpass = $_POST['newpassword'];
        
            // Fetch the user's current password from the database
            $select = "SELECT * FROM `singhup2` WHERE `email` = ?";
            $stmt = $connection->prepare($select);
            $stmt->bind_param("s", $upemail);
            $stmt->execute();
            $result = $stmt->get_result();
        
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $email = $row['email'];
                $password = $row['password'];
        
                // Check if the old password matches
                if ($upoldpass == $password) {
                    // Update the password
                    $update = "UPDATE `singhup2` SET `password` = ?, `cpassword` = ? WHERE `email` = ?";
                    $stmt = $connection->prepare($update);
                    $stmt->bind_param("sss", $upnewpass, $upnewpass, $upemail);
                    $update_result = $stmt->execute();
        
                    if ($update_result) {
                        echo "Data successfully updated";
                    } else {
                        echo "Data not updated";
                    }
                } else {
                    echo "Old password not matched";
                }
            } else {
                echo "User not found";
            }
        } else {
            echo "Click failed";
        }
    ?>
    <div class="container-fluid">
        <div class="container">
            <a href="index.php">home</a>
            <a href="profile.php">Profile</a>
            <a href="delete.php">delete</a>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Old Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="oldpassword">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="newpassword">
                </div>
                <input type="submit" name="submit" value="submit" class="btn btn-primary">
            </form>
        </div>
    </div>
</body>
</html>