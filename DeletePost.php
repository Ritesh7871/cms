<?php 
include('Includes/db.php');
include('Includes/function.php');
include('includes/sessions.php');
confirm_login();
$search = $_GET['id'];
global $con;
             
              $sql ="select * from posts where id='$search'";
              $result = mysqli_query($con,$sql);
              while($row=mysqli_fetch_assoc($result)){
                $title = $row['title'];
                $category = $row['category'];
                $image = $row['image'];
                $post = $row['post'];
              }
            //   echo $image;
if(isset($_POST["submit"])){
    

        // delete query
        global $con;
        $sql ="Delete from posts where id = '$search'";
        $result=mysqli_query($con,$sql);
        
    if ($result) {
        $Target_path_to_delete_image ="Uploads/$image";
        unlink($Target_path_to_delete_image);
        $_SESSION["SuccessMessage"] = "post Deleted Successfully";
        Redirect_to("posts.php");
    } else {
        $_SESSION["ErrorMessage"] = "Something went wrong. Try Again!";
        Redirect_to("posts.php");
    }
    
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Post</title>
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
                <h1><i class="fas fa-edit"style="color: #27aae1"></i>Delete Post</h1>
            </div>
            </div>
        </div>
    </header>
    <!-- header End -->
    
    <!-- MAin area  -->
    <section class="container py-2 mb-4">
        <div class="row">
        <div class="offset-lg-1 col-lg-10" style="min-height:400px;">
        <?php echo ErrorMessage();
              echo SuccessMessage();
              
        ?>
        <form action="DeletePost.php?id=<?php echo $search; ?>"method="post"class=""enctype="multipart/form-data">
        <div class="card bg-secondary text-light mb-3">
          
            <div class="card-body bg-dark">
                <div class="form-group">
                    <label for="title"><span class="FieldInfo">Post Title:</span></label>
                    <input type="text"name="post_title" id="title" placeholder="Type title here"disabled class="form-control" value="<?php
                    echo $title;
                    ?>">
                </div>
                <div class="form-group">
                    <span class="FieldInfo">Existing Category:</span>
                    <?php  echo $category;?>
                    <br>
                   
                    <!-- <select class="form-control"id="categoryTitle" name="category>
                 
                </select> -->
                </div>
                <div class="form-group mb-1">
                <span class="FieldInfo">Existing Image:</span>
                <img class="mb-1"src="Uploads/<?php  echo $image; ?>" width="170px" height="70px";>
                    <label for="imageSelect"><span class="FieldInfo">Select Image</span></label>
                    
                </div>
                <div class="form-group">
                <label for="post"><span class="FieldInfo">Post:</span></label>
                <textarea name="postDescription" disabled class="form-control"id="post" cols="30" rows="10">
                    <?php echo $post; ?>
                </textarea>
                </div>
                <div class="row">
                <div class="col-lg-6 mb-2">
                    <a href="Dashboard.php" class="btn btn-warning btn-block"><i class="fas fa-arrow-left"></i>BAck To Dashboard</a>
                </div>
                <div class="col-lg-6 mb-2">
                    <button type="submit" name="submit"class="btn btn-danger btn-block">
                    <i class="fas fa-trash"></i>Delete
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