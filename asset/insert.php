<?php
    include("connect.php");

    if(isset($_POST['submit'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        // echo $fname,$lname,$email,$mobile,$password,$cpassword;
        
        if($fname=="" || $lname=="" || $email=="" || $mobile=="" || $password=="" || $cpassword==""){
            echo "All fields are require";
        }else if(!textValidation($fname,$lname)){
            echo "Invalid name";
        }else if(!mailValidation($email)){
            echo "Invalid mail";
        }
        else if(!is_numeric($mobile)){
            echo "Mobile number should be numeric";
        }else if($password !== $cpassword){
            echo "Password and Confirm Password should be same";
        }else{
            $sql = "INSERT INTO `singhup2`(`fnam`, `lname`, `email`, `mobile`, `password`, `cpassword`) VALUES ('$fname','$lname','$email','$mobile','$password','$cpassword')";
            $qry = mysqli_query($connection ,$sql);
            if($qry){
                echo "Data successfully Inserted!";
            }else{
                echo "Insert failed";
            }
        }
    }
    
    function textValidation($fname, $lname) {
        return preg_match('/^[a-zA-Z]+$/', $fname) && preg_match('/^[a-zA-Z]+$/', $lname);
    }
    
    function mailValidation($email) {
        return preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email);
    }
   
?>

