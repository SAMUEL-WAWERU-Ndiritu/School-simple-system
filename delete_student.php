<?php require_once 'header.php'?>
<?php
require_once 'connect.php';
require_once 'nav-bar.php';
$count= 0;
if(isset($_POST['submit'])){
    $fname= trim($_POST['fname']);
    $lastname= trim($_POST['lastname']);

$sql= "SELECT * FROM student_record ORDER BY id ASC WHERE fname=$fname || lastname=$lastname";
$result= mysqli_query($conn,$sql);
}
?>
<div class="form_responsive text-center">
<form action="display_student_record.php" method="POST">
<label for="fname">First Name</label>
<input type="text" name="fname" id="fname">
<label for ="lastname">Last Name</label>
<input type="text" name="lastname" id="lastname"><br>
<button type="submit" name="submit" class="my-3 mx-5 btn btn-lg btn-success">SEARCH RECORD</button>

</form>
</div>
<div class="container-fluid">
            <div class="row">
                <h3 class="text-center">STUDENT RECORD</h3>
                <div class="table-responsive">
                <table class="table table-border">

<?php
$sql= "SELECT * FROM student_record ORDER BY id ASC";
$result= mysqli_query($conn,$sql);

?>
        
                    <tr>
                        <th col>Id</th>
                        <th col>Fist Name</th>
                        <th col>Last Name</th>
                        <th col>Religion</th>
                        <th col>Gender</th>
                        <th col>Phone No</th>
                        <th col>Country</th>
                        <th col>City</th>
                        <th col>State</th>
                        <th col>Adress</th>
                        <th col>Previous School</th>
                        <th col>Class</th>
                        <th col>Registration Date</th>
                        <th col>Action</th>
                              </tr>
                            <?php
                            $rowCount= mysqli_num_rows($result);
                            if($rowCount > 0){
                                while($row= mysqli_fetch_assoc($result)){
                                    $count= $count + 1;
                                    ?>
                                    <tr>
                                    <td><?php echo $row['id']?></td>
                                    <td><?php echo $row['fname']?></td>
                                    <td><?php echo $row['lastname']?></td>
                                    <td><?php echo $row['religion']?></td>
                                    <td><?php echo $row['gender']?></td>
                                    <td><?php echo $row['phone']?></td>
                                    <td><?php echo $row['country']?></td>
                                    <td><?php echo $row['city']?></td>
                                    <td><?php echo $row['state']?></td>
                                    <td><?php echo $row['address']?></td>
                                    <td><?php echo $row['school']?></td>
                                    <td><?php echo $row['class']?></td>
                                    <td><?php echo $row['registration']?></td>
                                    
                                    
                                    <td><a href="del-student.php?add&id=<?php echo $row['id']?>"><span class="text-danger">Delete</span></a></td>
                                    </tr>
                                    
                            
                                    <?php
                                }
                            }
                            ?>
                            <div class="text-center bg-primary text-white ">TOTAL STUDENT <?php  echo $count ?></div>
                       
                </table>
    </div>
    </div>
    </div>
        
    <?php require_once 'footer.php'?>