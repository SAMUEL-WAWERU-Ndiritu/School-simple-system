<?php require_once 'header.php'?>

<?php
require_once 'connect.php';
$errors= array();
if(isset($_POST["submit"])){
    $name=trim ($_POST["username"]);
    $password= trim($_POST['password']);

    if(empty($name) || empty($password)){
        header("location:login.php?error=emptyfields");
        array_push($errors,"emptyfields");
        exit();
    }else{
       $sql= "SELECT * FROM login WHERE username=?";
       $stmt= mysqli_stmt_init($conn);
       
       if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location:login.php?error=sqleror");
        array_push($errors,"sqlerror");
        exit();
       }else{
           mysqli_stmt_bind_param($stmt,"s",$name);
           mysqli_stmt_execute($stmt);
           $result=mysqli_stmt_get_result($stmt);
           if($row= mysqli_fetch_assoc($result)){
               $passCheck = password_verify($password,$row["password"]);
               if($passCheck==false){
                header("location:login.php?error=wrongpassword");
                array_push($errors,"Wrongpassword");
                exit();
               }elseif($passCheck==true){
                   session_start();
                   $_SESSION["id"]= $row["id"];
                   $_SESSION["username"] = $row["username"];
                   header("location:home.php?youareloggedin");
                   exit();
               }else{
                header("location:login.php?error=wrongpassword");
                array_push($errors,"Wrongpassword");
                exit();
               }

           }else{
            header("location:login.php?error=usernamedoesnotexist");
            array_push($errors,"username does not exist");
            exit();
           }
       }

    }
}

?>

<?php if(count($errors) > 0) :?>
<div class="errors">
<?php foreach($errors as $error) :?>
<p> <?php echo $error;?></p>
<?php endforeach ?>
</div>
<?php endif ?>
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
                    <form action="login.php" method="POST">
                    <?php include "error.php"?>
                        <div class="my-3 text-center">
                            <label for="fname">Username:</label><br>
                            <input type="text" name="username" placeholder="USERNAME" id="fname"></div>
                        <div class="my-3 text-center">
                        <label for="pass">Password:</label><br>
                            <input type="password" name="password" placeholder="PASSWORD" id="pass"></div>
        
                        <div class="my-3 text-center"><button type="submit" class="btn btn-lg bg-success" name="submit">LOGIN</button></div>
                        <p> NO account?? <a href="registration.php">Register here</a></p>
                    </form>
                </div>
               </div>
            </div>
                
        </div>
    </div>
    <?php require_once 'footer.php'?>