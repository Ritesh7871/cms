<?php 
include('Includes/db.php');
include('Includes/function.php');
include('includes/sessions.php');

if(isset($_GET['id'])){
    $search = $_GET['id'];
    global $con;
    
    $sql ="Delete from comments  where id='$search'";
    $result=mysqli_query($con,$sql);
    if($result){
       $_SESSION['SuccessMessage']="Comment Deleted Successfully!";
       Redirect_to("Comments.php"); 
    }else{
        $_SESSION['ErrorMessage']="Something went wrong.Try Again!";
       Redirect_to("Comments.php"); 
    }
    
    
}
?>

