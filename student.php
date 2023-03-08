<?php require_once 'header.php'?>
<?php
require_once 'connect.php';
?>
<?php
if(isset($_POST["submit"])){
    $admission = trim($_POST['admission']);
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

    if(empty($admission) || empty($fname) || empty($lastname) || empty($religion) || empty($gender) || empty($date) || empty($phone)||empty($country)|| empty($city) || empty($state) || empty($address) || empty($registration) || empty($school) || empty($class)){
        header("location:insert.php?error=input the field");
    }else{
        $sql ="INSERT INTO student_record(admission,fname,lastname,religion,gender,date,phone,country,city,state,address,registration,school,class)
        VALUES('$admission','$fname','$lastname','$religion','$gender','$date','$phone','$country','$city','$state','$address','$registration','$school','$class')";
        if(mysqli_query($conn,$sql)){?>
        <div class="alert">
            <script>alert("Your registartion was successful")</script>
        </div>
        <?php

        }else{
            header("location:insert.php?error=errorwhensending");
        };
    }



}
require_once 'nav-bar.php';
?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="student.php">
            <fieldset>
                <legend class="text-center text-info">Student details</legend>
                <div class="text">
                <div><label for="firstname">First Name</label>
                <input type="text" name="fname" id="fname"  class="pull-right">
                </div>
                <div>
                <label for="lastname">Last Name</label>
                <input type="text" name="lastname" id="lastname">
                 </div>
                
             </div>


             <div class="my-3 text-1">
                  <label for="admission">Admission No</label>
                    <input type="text" name="admission" id="admission" > 
                 </div>

             <div class="my-3 text-1">
                <label for="religion">Religion</label>
                <input type="text" name="religion" id="religion">
             </div>
                <div class="my-3 text-1">
                    <label for="gender">Gender</label>
                    <input type="radio" name="gender" value="male" id="gender">Male,
                    <input type="radio" name="gender" value="female" id="gender">Female,
                    <input type="radio" name="gender" value="other" id="gender">Other
                </div>
                <div class="my-3 text-1">
                    <label for="date">Date of birth</label>
                    <input type="date" name="date" id="date">
                </div>
                <div class="my-3 text-1">
                    <label for="phone">Phone No</label>
                    <input type="tel" name="phone" id="phone">
                </div>


                <div class="text">
                    <div>
                 <label for="country">County</label>

                    <select name="country">
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
                    <select name="city" id="City">
                    <option value="Kenya">Nairobi</option>
                    <option value="Kenya">Nakuru</option>
                    <option value="Kenya">Muranga</option>
                    <option value="Kenya">Nyeri</option>
                    <option value="Kenya">Kisumu</option>
                    <option value="Kenya">Machakos</option>
                </select>
                </div>
              </div>

             <div class="text my-3">
                <div>
                    <label for ="state">State </label>
                        <input type="text" name="state" id='state'>
                   
                </div>
                <div>
                    <label for="address">Address</label>
                        <input type="text"  name="address" id="address">
            
                </div>
              </div>
         

                <div class="my-3 text-1">

                    <label for="date">Registration Date</label>
                    <input type="date" name="registration" id="date">
                </div>
                <div class="my-3 text-1">
                    <label for="school">Last School Attended </label>
                    <input type="text" name="school" id="school" >
                </div>
                <div class="my-3 text-1">
                    <label for="class">Class</label>
                    <input type="text" name="class" id="class">
                </div>
                <div class="text-center">
                    <input type="submit" name="submit" value="Register" class="bg-success btn btn-lg">
                </div>
                </fieldset>

            </form>
        </div>
    </div>
</div>



<?php require_once 'footer.php'?>