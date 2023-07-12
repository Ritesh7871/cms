 
<?php 
include('Includes/db.php');
include('Includes/function.php');
include('includes/sessions.php');
// echo $_SESSION['userid'];
$_SESSION["TrackingURL"] =$_SERVER["PHP_SELF"];
// echo $_SESSION["TrackingURL"];
confirm_login();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
                <h1><i class="fas fa-cog"style="color: #27aae1"></i>Dashboard</h1>
            </div>
            <div class="col-lg-3 mb-2">
                <a href="AddNewPost.php"class="btn btn-primary btn-block">
                    <i class="fas fa-edit"></i>Add New Post
                </a>
            </div>
            <div class="col-lg-3 mb-2">
                <a href="Categories.php"class="btn btn-info btn-block">
                    <i class="fas fa-folder-plus"></i>Add New Category
                </a>
            </div>
            <div class="col-lg-3 mb-2">
                <a href="Admins.php"class="btn btn-warning btn-block">
                    <i class="fas fa-user-plus"></i>Add New Admin
                </a>
            </div>
            <div class="col-lg-3 mb-2">
                <a href="Comments.php"class="btn btn-success btn-block">
                    <i class="fas fa-check"></i>Approve Comments
                </a>
            </div>
            </div>
        </div>
    </header>
    <!-- header End -->
    
    <!-- MAin area  -->
    <section class="container py-2 mb-4">
    
        <div class="row">
        <?php 
            SuccessMessage();
            ErrorMessage();
            ?>
            <div class="col-lg-2 d-none d-md-block">
                <div class="card text-center bg-dark text-white mb-3">
                    <div class="card-body">
                        <h1 class="lead">Posts</h1>
                        <h4 class="display-5">
                        <i class="fa-brands fa-readme"></i>
                            <!-- <i class="fas fa-readme"></i> -->
                            <?php
                            global $con;
                            $sql="Select count(*) from posts";
                            $result=mysqli_query($con,$sql);
                            $row_data=mysqli_fetch_assoc($result);
                            $row_count=array_shift($row_data);
                            echo $row_count;

                            ?>
                        </h4>
                    </div>
                </div>
                <div class="card text-center bg-dark text-white mb-3">
                    <div class="card-body">
                        <h1 class="lead">Categories</h1>
                        <h4 class="display-5">
                            <i class="fas fa-folder"></i>
                            <?php
                            global $con;
                            $sql="Select count(*) from category";
                            $result=mysqli_query($con,$sql);
                            $row_data=mysqli_fetch_assoc($result);
                            $row_count=array_shift($row_data);
                            echo $row_count;

                            ?>
                        </h4>
                    </div>
                </div>
                <div class="card text-center bg-dark text-white mb-3">
                    <div class="card-body">
                        <h1 class="lead">Admins</h1>
                        <h4 class="display-5">
                            <i class="fas fa-users"></i>
                            <?php
                            global $con;
                            $sql="Select count(*) from admins";
                            $result=mysqli_query($con,$sql);
                            $row_data=mysqli_fetch_assoc($result);
                            $row_count=array_shift($row_data);
                            echo $row_count;

                            ?>
                        </h4>
                    </div>
                </div>
                <div class="card text-center bg-dark text-white mb-3">
                    <div class="card-body">
                        <h1 class="lead">Comments</h1>
                        <h4 class="display-5">
                            <i class="fas fa-comments"></i>
                            <?php
                            global $con;
                            $sql="Select count(*) from comments";
                            $result=mysqli_query($con,$sql);
                            $row_data=mysqli_fetch_assoc($result);
                            $row_count=array_shift($row_data);
                            echo $row_count;

                            ?>
                        </h4>
                    </div>
                </div>
            </div>
            <!-- left side area end  -->
            <!-- Right side area  -->
            <div class="col-lg-10">
                <h1>Top Posts</h1>
                <table class="table table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>SI.No.</th>
                            <th>Title</th>
                            <th>Date&Time</th>
                            <th>Author</th>
                            <th>Comments</th>
                            <th>Details</th>
                            
                        </tr>
                    </thead>
                    <?php 
                    global $con;
                    $sr =0;
                    $sql = "select * from posts order by id desc limit 0,5";
                    $result=mysqli_query($con,$sql);
                    while($rows=mysqli_fetch_assoc($result)){
                        $postId = $rows['id'];
                        $Datetime = $rows['datetime'];
                        $Author =$rows['author'];
                        $title = $rows['title'];
                        $sr++;
                    
                    ?>
                    <tbody>
                        <tr>
                            <td><?php echo $sr; ?></td>
                            <td><?php echo $title; ?></td>
                            <td><?php echo $Datetime; ?></td>
                            <td><?php echo $Author; ?></td>
                            <td>
                                
                                    <?php 
                                    global $con;
                                    $total=ApproveCommentsPost($postId);
                                    if($total>0){
                                        ?> 
                                        <span class="badge badge-success">
                                            <?php
                                        echo $total; ?>
                                        </span>
                                        <?php
                                    }
                                    ?>
                                    </span>
                                
                                    <?php 
                                    global $con;
                                    $total=DisApproveCommentsPost($postId);
                                    if($total>0){
                                        ?> 
                                        <span class="badge badge-danger">
                                            <?php
                                        echo $total; ?>
                                        </span>
                                        <?php
                                    }
                                    ?>
                                    </span>
                            </td>
                            <td>
                                <a target="_blank"href="FullPost.php?id=<?php echo $postId; ?>">
                            <span class="btn btn-info">Preview</span></a>
                            </td>
                        </tr>
                </tbody>
                <?php  } ?>
                </table>
            </div>
            <!-- Right side area end  -->
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