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
    <!-- css -->
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <?php
        include("asset/connect.php");

        $select = "SELECT * FROM `singhup2`";
        
        $result = mysqli_query($connection,$select);
    ?>
    <div class="container-fluid">
        <div class="container">
            <a href="index.php">Home</a>
            <a href="update.php">Update</a>
            <a href="delete.php">delete</a>
            <table class="table">
                <thead>
                    <tr>
                      <th scope="col">First</th>
                      <th scope="col">Last</th>
                      <th scope="col">Mobile</th>
                      <th scope="col">Email</th>
                      <th scope="col">Password</th>
                      <th scope="col">Update</th>
                      <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    while($row = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                      <td><?php echo $row['fnam']; ?></td>
                      <td><?php echo $row['lname']; ?></td>
                      <td><?php echo $row['mobile']; ?></td>
                      <td><?php echo $row['email']; ?></td>
                      <td><?php echo $row['password']; ?></td>
                      <td><a href="update.php"><button class="btn btn-success">Update</button></a></td>
                      <td><a href="/"><button class="btn btn-danger">Delete</button></a></td>
                    </tr>
                </tbody>
                <?php
                    }
                ?>
            </table>
        </div>
    </div>
    
</body>
</html>