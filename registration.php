<?php require_once 'header.php'?>
<?php
require_once 'connect.php';
 $errors= array();

if(isset($_POST['submit'])){
    $username= trim($_POST['username']);
    $password = trim($_POST["password"]);
    $confirm_pass= trim($_POST['confirm_password']);


    if(empty($username) || empty($password) || empty($confirm_pass)){
        header('location:registration.php?error=emptyfields');
       array_push($errors,"Please fill all the fields");
       exit();
    }elseif(!preg_match("/^[a-zA-Z0-9]*/",$username)){
        header('location:registration.php?error=thenameformatinvalid');
        array_push($errors,"Please the name format is invalid");
        exit();
    }elseif($password !== $confirm_pass){
        header("location:registration.php?error=passworddon'tmatch");
        array_push($errors,"Please the password don't match");
        exit();
    } else{
        $sql ="SELECT username FROM login WHERE username=?";
        $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header('location:registration.php?error=sqlerror');
        array_push($errors,"the sql error");
        exit();
        }else{
            mysqli_stmt_bind_param($stmt,'s',$username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $results= mysqli_stmt_num_rows($stmt);
            if($results > 0){
                    header('location:registration.php?error=usernameexist');
                    array_push($errors,"username exist");
                    exit();
            }else{
                $sql="INSERT INTO login(username,password)VALUES(?,?)";
                  $stmt= mysqli_stmt_init($conn);
               if(!mysqli_stmt_prepare($stmt,$sql)){
                header('location:registration.php?error=sqlerror');
                 array_push($errors,"the sql error");
                exit();
             }else{
               $hasspass= password_hash($password,PASSWORD_DEFAULT);
              mysqli_stmt_bind_param($stmt,"ss",$username,$hasspass);
               mysqli_stmt_execute($stmt);
               header("location:home.php");
            }

            }
        }
    }


}

?>
<div class= "container-fluid">
        <div class="header">
            <h1 class="text-center text-danger bg-primary p-3">
                <strong>NYAHURURU PRIMARY SCHOOL</strong>
            </h1>
        </div>
</div>
    <div class="container">
        <div class="row ">
            <div class="col">
                <div class="height">
                <div class="form">
                    <form action="registration.php" method="POST">
                    <?php include "error.php"?>
                        <div class="my-3 text-center">
                            <label for="fname">Username:</label><br>
                            <input type="text" name="username" placeholder="USERNAME" id="fname"></div>
                        <div class="my-3 text-center">
                        <label for="pass">Password:</label><br>
                            <input type="password" name="password" placeholder="PASSWORD" id="pass"></div>
                        <div class="my-3 text-center">
                        <label for="pass-1">Confirm Password:</label>  <br>
                        <input type="password" name="confirm_password" placeholder="CONFIRM PASSWORD" id="pass-1"></div>
                        <div class="my-3 text-center"><button type="submit" class="btn btn-lg bg-success" name="submit">REGISTER</button></div>
                        <p>Already have an account?? <a href="login.php">Login here</a></p>
                    </form>
                </div>
               </div>
            </div>
                
        </div>
    </div>
    <?php require_once 'footer.php'?>