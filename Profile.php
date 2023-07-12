<?php 
include('Includes/db.php');
include('Includes/function.php');
include('includes/sessions.php');
// Fetching Existing data
$search = $_GET['username'];
global $con;
$sql ="select aname,aheading,abio,aimage from admins where username='$search'";
$result=mysqli_query($con,$sql);
$result_count=mysqli_num_rows($result);
if($result_count==1){
    while($rows=mysqli_fetch_assoc($result)){
        $Existingname= $rows['aname'];
        $Existingbio =$rows['abio'];
        $Existingimage ="Uploads/".$rows['aimage'];
        $Existingheadline =$rows['aheading'];
    }
}else{
    $_SESSION["ErrorMessage"] ="Bad Request !! ";
    Redirect_to("Blog.php");
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>

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
                    <a href="Blog.php"class="nav-link">Home</a>
                </Li>
                <Li class="nav-item">
                    <a href="#"class="nav-link">About Us</a>
                </Li>
                <Li class="nav-item">
                    <a href="Blog.php"class="nav-link">Blog</a>
                </Li>
                <Li class="nav-item">
                    <a href="#"class="nav-link">Contact Us</a>
                </Li>
                <Li class="nav-item">
                    <a href="#"class="nav-link">Features</a>
                </Li>
        
            </ul>
            <ul class="navbar-nav ml-auto">
            <form action="Blog.php" class="form-inline d-none d-sm-block">
                <div class="form-group">
                <input type="text"class="form-control mr-2"name="search"placeholder="Search here" value="">
                <button class="btn btn-primary" name="searchbutton">Go</button>
                
                </div>
            </form>
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
                <div class="col-md-6">
                <h1><i class="fas fa-user text-success mr-2"style="color: #27aae1"></i><?php echo $Existingname; ?></h1>
                <h3><?php echo $Existingheadline; ?></h3>
            </div>
            </div>
        </div>
    </header>
    <!-- header End -->
    <section class="container py-2 mb-4">
        <div class="row">
            <div class="col-md-3">
                <img src="<?=$Existingimage ?>"class="d-block img-fluid mb-3 rounded-circle" alt="">
            </div>
            <div class="col-md-9" style="min-height:550px;">
                <div class="card">
                    <div class="card-body">
                        <p class="lead">
                        <?php echo $Existingbio; ?>    
                    </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- MAin area  -->



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