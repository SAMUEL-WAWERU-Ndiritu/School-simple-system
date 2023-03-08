<?php
require_once 'connect.php';
require_once 'header.php';

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
     
    if(empty($fname) || empty($lastname) || empty($religion) || empty($gender) || empty($date) || empty($phone)||empty($country)|| empty($city) || empty($state) || empty($address)){
        header("location:insert.php?error=input the field");
    }else{
        $sql ="INSERT INTO employees_record(fname,lastname,religion,gender,date,phone,country,city,state,address,parent_name,parent_phone,parent_profession,guardian_name,gurdian_phone)
         VALUES('$fname','$lastname','$religion','$gender','$date','$phone','$country','$city','$state','$address','$parent_name','$parent_phone','$parent_profession','$guardian_name','$gurdian_phone')";;
        if(mysqli_query($conn,$sql)){ ;?>

        <div class="alert">
            <script>alert("Your registartion was successful")</script>
        </div>
        <?php

        }else{
            header("location:employee.php?error=errorwhensending");
        };
    }  


}
require_once 'nav-bar.php';
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="employee.php">
            <fieldset>
                <legend class="text-center text-info">Employees details</legend>
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
                    <input type="number" name="phone" id="phone">
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
         
              <h3 class="text-center">Employee Parent Information</h3>
                    <div class="text-1 my-3">
                        <label for="parent_name">Name</label>
                        <input type="text" name="parent_name" id="parent_name">
                    </div>
                    <div class="text-1 my-3">
                    <label for="phone">Phone No</label>
                    <input type="number" name="parent_phone" id="phone">
                   </div>
                   <div class="text-1 my-3">
                       <label for="profession">Profession </label>
                       <input type="text" name="parent_profession" id="profession">
                  </div>
                </div>
                
                    <h3 class="text-center">Guardian Information</h3>
                    <div class="text-1 my-3">
                    <label for="guardian_name">Name</label>
                    <input type="text" name="guardian_name" id="guardian_name">
                </div>
                <div class="text-1 my-3">
                    <label for="phone">Phone No</label>
                    <input type="number" name="gurdian_phone" id="phone">
                   </div>
                <div class="text-1 my-3">
                    <label for="date">Registration Date</label>
                    <input type="date" name="registration" id="date">
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