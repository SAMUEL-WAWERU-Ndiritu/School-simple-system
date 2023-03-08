<?php

require_once 'connect.php';
    $sql = "DELETE FROM student_record WHERE id =' ". $_GET['id']."'";
    $result = mysqli_query($conn,$sql);
    if($result){
        echo "<script>alert('Record Delete succefully')</script>";
        echo "<script>window.location='delete_student.php'</script>";
      
        
    
    }else{
        echo "<script>alert ('Unable to delete')</script>";
    }
   


 ?>