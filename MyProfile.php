<?php
include('Includes/db.php');
include('Includes/function.php');
include('includes/sessions.php');
$_SESSION["TrackingURL"] =$_SERVER["PHP_SELF"];
confirm_login();
// fetching the existing admin data 
$adminid=$_SESSION['userid'];
global $con;
$sql ="Select * from admins where id='$adminid'";
$result=mysqli_query($con,$sql);
while($rows=mysqli_fetch_assoc($result)){
    // print_r($rows);
    // die();
    // // echo"<pre>";
    $Existingname = $rows['aname'];
    $Existingusername =$rows['username'];
    $Existingheadline =$rows['aheading'];
    $Existingbio =$rows['abio'];
    $ExistingImage ="Uploads/".$rows['aimage'];
}
// fetching the existing admin data end 
if(isset($_POST["submit"])){
    $aname =$_POST["name"];
    $aheadline = $_POST['headline'];
    $abio =$_POST['Bio'];
    
    if (!isset($_FILES['image'])) {
        // The "image" key is not present in the $_FILES array
        // Handle the error or provide a default action
        echo "Error: No file uploaded";
    } else {
        // The "image" key is present in the $_FILES array
        $image_name = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
      
        // Rest of your code
    }
      
    if (strlen($aheadline)>30){
        $_SESSION["ErrorMessage"] = "Headline should be less than 30 characters";
        Redirect_to("MyProfile.php");

    }
    elseif (strlen($abio)>500){
        $_SESSION["ErrorMessage"] ="Bio should be less than 500 character";
        Redirect_to("MyProfile.php");

    }else{
        // Update Admin data
        global $con;
        if(!empty( $_FILES['image']['name'])){
            $sql = "update admins set aname='$aname',aheading='$aheadline',abio='$abio',aimage='$image_name'where id = '$adminid'";
        }else{
            $sql = "update admins set aname='$aname',aheading='$aheadline',abio='$abio' where id = '$adminid'";
        
        }
        move_uploaded_file($image_tmp,"Uploads/$image_name");
        $result = mysqli_query($con,$sql);
    if ($result) {
        $_SESSION["SuccessMessage"] = "Details updated Successfully";
        Redirect_to("MyProfile.php");
    } else {
        $_SESSION["ErrorMessage"] = "Something went wrong. Try Again!";
        Redirect_to("MyProfile.php");
    }
    
}


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>

    <!-- navbar -->
    <div style="height:10px;background-color: cyan;"></div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container" >
            <a href="#" class="navbar-brand">KASHYAP.COM</a>
            <button class="navbar-toggler" data-toggle="collapse"data-target="#navbarcollapseCMS">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse"id="navbarcollapseCMS">
            <ul class="navbar-nav mr-auto">
                <Li class="nav-item">
                    <a href="Myprofile.php"class="nav-link"><i class="fa-solid fa-user text-success"></i> My Profile</a>
                </Li>
                <Li class="nav-item">
                    <a href="Dashboard.php"class="nav-link">Dashboard</a>
                </Li>
                <Li class="nav-item">
                    <a href="Posts.php"class="nav-link">Posts</a>
                </Li>
                <Li class="nav-item">
                    <a href="Categories.php"class="nav-link">Categories</a>
                </Li>
                <Li class="nav-item">
                    <a href="Admins.php"class="nav-link">Manage Admins</a>
                </Li>
                <Li class="nav-item">
                    <a href="Comments.php"class="nav-link">Comments</a>
                </Li>
                <Li class="nav-item">
                    <a href="Blog.php?page=1"class="nav-link">Live Blog</a>
                </Li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-itme"><a href="Logout.php" class="nav-link text-danger">
                    <i class="fas fa-user-times"></i> Logout</a></li>
            </ul>
        </div>
        </div>
    </nav>
    <div style="height:10px;background-color: cyan;"></div>
    <!-- Navbar End  -->
    <!-- header -->
    <header class="bg-dark text-white py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <h1><i class="fas fa-user  text-success mr-2"></i>@<?php echo $Existingusername; ?></h1>
                <small><?php echo $Existingheadline; ?></small>
            </div>
            </div>
        </div>
    </header>
    <!-- header End -->
    
    <!-- MAin area  -->
    <section class="container py-2 mb-4">
        <div class="row">
            <!-- left area  -->
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header bg-dark text-light">
                        <h3><?php echo $Existingname; ?></h3>
                    </div>
                    <div class="card-body">
                        <img src="<?=$ExistingImage?>"class="block img-fluid mb-3" alt="">
                        <div class="">
                            <?php echo $Existingbio; ?>
                       </div>
                    </div>
                </div>
            </div>
            <!-- right area  -->
        <div class="col-md-9" style="min-height:400px;">
        <?php echo ErrorMessage();
              echo SuccessMessage();
        ?>
        <form action="MyProfile.php"method="post"class=""enctype="multipart/form-data">
        <div class="card bg-dark text-light">
          <div class="card-header bg-secondary text-light">
            <h4>Edit Profile</h4>
          </div>
            <div class="card-body ">
                <div class="form-group">
                    
                    <input type="text"name="name" id="title" placeholder="Your name"class="form-control">
                
                </div>
                <div class="form-group">
                    
                    <input type="text"name="headline" id="title" placeholder="Headline"class="form-control">
                    <small class="text-muted">Add a professional headlines like ,'Engineer at xyz' or 'Architect'</small>
                    <span class="text-danger">Not more than 12 character</span>
                </div>
                <div class="form-group">
                    
                    <textarea name="Bio" id="" cols="30" rows="10" class="form-control" placeholder="Bio"></textarea>
                </div>
                <div class="form-group">
                    <label for="imageSelect"><span class="FieldInfo">Select Image</span></label>
                    <div class="custom-file">
                        <input type="file"class="custom-file-input"name="image"id="imageSelect"value="">
                        <label for="imageSelect"class="custom-file-label">Select Image</label>
                        </div>
                </div>
               
                <div class="row">
                <div class="col-lg-6 mb-2">
                    <a href="Dashboard.php" class="btn btn-warning btn-block"><i class="fas fa-arrow-left"></i>BAck To Dashboard</a>
                </div>
                <div class="col-lg-6 mb-2">
                    <button type="submit" name="submit"class="btn btn-success btn-block">
                    <i class="fas fa-check"></i>Publish
                    </button>
                </div>
                </div>
            </div>
        </div>
        </form>

        </div>
        </div>
    </section>



    <!-- End Main Area  -->
<!-- footer  -->
    <footer class="bg-dark text-white">
        <div clas="container">
            <div class="row">
                <div class="col">
                <p class="lead text-center"> Theme By | Kashyap Ray | <span id="year"></span> &copy; ----All right Reserved.</p>
                <p class="text-center small"><a href="http://kashyap.com/coupons/"target="_blank"style="color:white;text-decoration:none;cursor:pointer;">
                This site is only used for study purpose kashyap.com have all the rights.no one is allow to 
                copies other then <br>&trade;kashyap.com &trade;Udemy;&trade;Skillshare;&trade;StackSkills
                
                </a></p>
        
                </div>
            </div>
        </div>
    </footer>
    <div style="height:10px;background-color: cyan;"></div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script>
    $('#year').text(new Date().getFullYear());
</script>
</body>
</html>