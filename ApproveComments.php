<?php 
include('Includes/db.php');
include('Includes/function.php');
include('includes/sessions.php');

if(isset($_GET['id'])){
    $search = $_GET['id'];
    global $con;
    $Admin=$_SESSION['adminname'];
    $sql ="update comments set status ='on' ,approveby='$Admin' where id='$search'";
    $result=mysqli_query($con,$sql);
    if($result){
       $_SESSION['SuccessMessage']="Comment Approved Successfully!";
       Redirect_to("Comments.php"); 
    }else{
        $_SESSION['ErrorMessage']="Something went wrong.Try Again!";
       Redirect_to("Comments.php"); 
    }
    
    
}
?>

