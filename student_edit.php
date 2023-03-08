<?php 
require_once 'header.php';
require_once 'connect.php';

$sql= "SELECT * FROM student_record ORDER BY id ASC limit 30";
$result= mysqli_query($conn,$sql);
$rowCount= mysqli_num_rows($result);
if($rowCount> 0){
    $row=mysqli_fetch_assoc($result);
}else{
    header("location:employee.php?error=errorinretrival");
}

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
    $registration= trim($_POST['registration']);
    $school= trim($_POST["school"]);
    $class=trim($_POST["class"]);
     
    
        $sql ="UPDATE student_record SET fname='$fname',lastname ='$lastname',religion='$religion',gender='$gender',date='$date',phone='$phone',country='$country',city='$city',state='$state',address='$address',registration='$registration',school='$school',class='$class' WHERE id = $row[id]";
     
        if(mysqli_query($conn,$sql)){ ;?>

        <div class="alert">
            <script>alert("Your updation was successful")</script>
        </div>
        <?php

        }else{
            header("location:student_edit.php.php?error=errorwhensending");
        }
    }
    require_once 'nav-bar.php';

?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">

<form method="POST" action="employee_edit.php">
    <fieldset>
        <legend class="text-center text-info">STUDENT DETAILS</legend>
    <div class="text my-3">
             <div>
                <label for="firstname">First Name</label>
                <input type="text" name="fname" id="fname" value="<?php echo $row['fname']?>">
             </div>
             <div>
                <label for="lastname">Last Name</label>
                <input type="text" name="lastname" id="lastname" value="<?php echo $row['lastname']?>">
             </div>

      </div>
             <div class=" my-3 text-1">
                <label for="religion">Religion</label>
                <input type="text" name="religion" id="religion" value="<?php echo $row['religion']?>">
             </div>
             
                <div class=" my-3 text-1">
                    <label for="gender">Gender</label>
                    <input type="radio" name="gender"  id="gender">Male,
                    <input type="radio" name="gender"  id="gender">Female,
                    <input type="radio" name="gender"  id="gender">Other
                </div>
                <div class=" my-3 text-1">
                    <label for="date">Date of birth</label>
                    <input type="date" name="date" id="date" value="<?php echo $row['date']?>">
                </div>
                <div class=" my-3 text-1">
                    <label for="phone">Phone No</label>
                    <input type="number" name="phone" id="phone" value="<?php echo $row['phone']?>">
                </div>

                <div class="text my-3">
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
              </div>

              <div class="text my-3">
                <div>
                    <label for ="state">State </label>
                        <input type="text" name="state" id='state' value="<?php echo $row['state']?>">
                   
                </div>
                <div>
                    <label for="address">Address</label>
                        <input type="text"  name="address" id="address" value="<?php echo $row['address']?>">
                    
                </div>
              </div>

                <div class=" my-3 text-1">
                    <label for="date">Registration Date</label>
                    <input type="date" name="registration" id="date" value="<?php echo $row['registration']?>">
                </div>
                <div class=" my-3 text-1">
                    <label for="school">Last School Attended </label>
                    <input type="text" name="school" id="school" value="<?php echo $row['school']?>">
                </div>
                <div class=" my-3 text-1">
                    <label for="class">Class</label>
                    <input type="text" name="class" id="class" value="<?php echo $row['class']?>">
                </div>
             
                <div class="text-center">
                    <input type="submit" name="submit" value="UPDATE INFORMATION" class="bg-success btn btn-lg">
                </div>
          </fieldset>
            </form>
            </div>
            </div>
            </div>


