<?php 
require_once 'header.php';
require_once 'connect.php';



if(isset($_POST["submit"])){
    $fname= trim($_POST["fname"]);
    $lastname=trim($_POST['lastname']);
    $religion= trim($_POST["religion"]);
    $gender =trim($_POST['gender']);
    $date=trim($_POST["date"]);
    $phone=trim($_POST['phone']);
    $country=trim($_POST["country"]);
    $city= trim($_POST["city"]);
    $state= trim($_POST["state"]);
    $address= trim($_POST["address"]);
    $parent_name = trim($_POST['parent_name']);
    $parent_phone = trim($_POST['parent_phone']);
    $parent_profession = trim($_POST['parent_profession']);
    $guardian_name = trim($_POST['guardian_name']);
    $gurdian_phone = trim($_POST['gurdian_phone']);
     
    
        $sql ="UPDATE employees_record SET fname='$fname',lastname ='$lastname',religion='$religion',gender='$gender',date='$date',phone='$phone',country='$country',city='$city',state='$state',address='$address',parent_name='$parent_name',parent_phone='$parent_phone',parent_profession='$parent_profession',guardian_name='$guardian_name',gurdian_phone='$gurdian_phone' WHERE d =' ". $_GET['id']."'";
     
        if(mysqli_query($conn,$sql)){ ;?>

        <div class="alert">
            <script>alert("Your updation was successful")</script>
        </div>
        <?php

        }else{
            header("location:employee.php?error=errorwhensending");
        }
    }
    require_once 'nav-bar.php';
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
<?php
$sql= "SELECT * FROM employees_record ORDER BY id ASC limit 30";
$result= mysqli_query($conn,$sql);
$rowCount= mysqli_num_rows($result);
if($rowCount> 0){
   $row=mysqli_fetch_assoc($result);
       ?>

<form method="POST" action="employee_edit.php">

             <div class="text-left">
                <label for="firstname">First Name</label>
                <input type="text" name="fname" id="fname" value="<?php echo $row['fname']?>">
             </div>
             <div class="text-right">
                <label for="lastname">Last Name</label>
                <input type="text" name="lastname" id="lastname" value="<?php echo $row['lastname']?>">
             </div>
             <div>
                <label for="religion">Religion</label>
                <input type="text" name="religion" id="religion" value="<?php echo $row['religion']?>">
             </div>
             
                <div>
                    <label for="gender">Gender</label>
                    <input type="radio" name="gender" value="<?php echo $row['parent_phone']?>" id="gender">Male,
                    <input type="radio" name="gender" value="<?php echo $row['parent_phone']?>" id="gender">Female,
                    <input type="radio" name="gender" value="<?php echo $row['parent_phone']?>" id="gender">Other
                </div>
                <div>
                    <label for="date">Date of birth</label>
                    <input type="date" name="date" id="date" value="<?php echo $row['date']?>">
                </div>
                <div>
                    <label for="phone">Phone No</label>
                    <input type="number" name="phone" id="phone" value="<?php echo $row['phone']?>">
                </div>
                <div>
                 <label for="country">County</label>

                    <select name="country" value="<?php echo $row['country']?>">
                    <option value="Kenya" >Kenya</option>
                    <option value="Kenya" >Tanzania</option>
                    <option value="Kenya" >Uganda</option>
                    <option value="Kenya" >Ethiopia</option>
                    <option value="Kenya" >Somali</option>
                    <option value="Kenya">Egypt</option>
                </select>
                </div>
                
                <div>
                    <label for="City">City</label>
                    <select name="city" id="City" value="<?php echo $row['city']?>">
                    <option value="Kenya">Nairobi</option>
                    <option value="Kenya">Nakuru</option>
                    <option value="Kenya">Muranga</option>
                    <option value="Kenya">Nyeri</option>
                    <option value="Kenya">Kisumu</option>
                    <option value="Kenya">Mchakos</option>
                </select>
                </div>
                <div>
                    <label for ="state">State </label>
                        <input type="text" name="state" id='state' value="<?php echo $row['state']?>">
                   
                </div>
                <div>
                    <label for="address">Address</label>
                        <input type="text"  name="address" id="address" value="<?php echo $row['address']?>">
                    
                </div>
                <div>
                    <h3 class="text-center">Employee Parent Information</h3>
                    <div>
                        <label for="parent_name">Name</label>
                        <input type="text" name="parent_name" id="parent_name" value="<?php echo $row['parent_name']?>">
                    </div>
                    <div>
                    <label for="phone">Phone No</label>
                    <input type="number" name="parent_phone" id="phone" value="<?php echo $row['parent_phone']?>">
                   </div>
                   <div>
                       <label for="profession">Profession </label>
                       <input type="text" name="parent_profession" id="profession" value="<?php echo $row['parent_profession']?>">
                  </div>
                </div>
                <div>
                    <h3 class="text-center">Guardian Information</h3>
                    <label for="guardian_name">Name</label>
                    <input type="text" name="guardian_name" id="guardian_name" value="<?php echo $row['guardian_name']?>">
                </div>
                <div>
                    <label for="phone">Phone No</label>
                    <input type="number" name="gurdian_phone" id="phone" value="<?php echo $row['gurdian_phone']?>">
                   </div>
             
                
                <div>
                    <input type="submit" name="submit" value="UPDATE INFORMATION">
                </div>
       
            </form>

       <?php
   }
else{
    header("location:employee.php?error=errorinretrival");
}  

?>


            </div>
            </div>
            </div>


