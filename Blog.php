<?php 
include('Includes/db.php');
include('Includes/function.php');
include('includes/sessions.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BLog Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style media="screen">
        .heading{
    font-family:Bitter,Georgia,"Times New Roman",Times,serif;
    font-weight:bold;
    color: #005E90;
}
.heading:hover{
    color: #0090db;
}
    </style>

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
    <div class="container">
        <div class="row mt-4">
            <!-- main Area  -->
            <div class="col-sm-8 ">
            <h1>The Complete Responsive CMS Blog</h1>
            <?php 
            echo ErrorMessage();
            echo SuccessMessage();
            
            ?>
            <h1 class="lead">The Complete Blog by using PHP by Kashyap</h1>
            <?php 
            global $con;
            if(isset($_GET['searchbutton'])){
                $search_data_value=$_GET['searchbutton'];
              // condition to check isset or not 
             
              
              $search_query="Select * from posts where datetime like '%$search_data_value%' or title like '%$search_data_value%'
              or category like '%$search_data_value%' or post like '%$search_data_value%' ";
              $result = mysqli_query($con,$search_query);
              $num_of_rows=mysqli_num_rows($result);
              if($num_of_rows==0){
                echo"<h2 class='text-center text-danger'>No results match. No products found on this category!</h2>";
              }
            
            // if(isset($_GET['searchbutton'])){
            //     $search = $_GET['search'];
            //     $search_query="Select * from products where datetime like '%$search_data_value%' ";
            //     // $sql = "SELECT * FROM posts WHERE datetime LIKE ':search' OR title LIKE ':search' OR category LIKE ':search' OR post LIKE ':search'";
            //     $result = mysqli_query($con,$sql);
            //     // $stmt = $con->prepare($sql);
            //     $result->bindValue(':search', "%{$search}%");
            //     $result->execute();
                // $result = $stmt->get_result();
               }elseif(isset($_GET['page'])){
                $page = $_GET['page'];
                if($page==0 || $page<1){
                    $showpost=0;
                }else{
                
                $showpost=($page*4)-4;
                }
                $sql ="Select * from posts order by id desc limit $showpost,4";
                $result = mysqli_query($con,$sql);
               }
               // The default sql query
            else{$sql = "select * from posts order by id desc limit 0,3";
                $result=mysqli_query($con,$sql);
            }
            
            while($row=mysqli_fetch_assoc($result)){
                $postId =$row['id'];
                $DateTime = $row['datetime'];
                $title=$row['title'];
                $category =$row['category'];
                $Admin = $row['author'];
                $image = $row['image'];
                $postDescripton=$row['post'];
            
            ?>
            <div class="card">
                <img src="Uploads/<?php echo htmlentities($image); ?>"style="max-height:450px;"class="img-fluid card-img-top" />
                <div class="card-body">
                    <h4 class="card-title">Post <?php echo htmlentities($postId) ?></h4>
                    <small class="text-muted">Category:<span class="text-dark"><a href="Blog.php?category=<?php echo htmlentities($category); ?>"><?php echo htmlentities($category); ?></a></span> & Written by <span class="text-dark"><a href="Profile.php?username=<?php echo htmlentities($Admin); ?>"><?php echo htmlentities($Admin); ?></a></span> on <span class="text-dark"><?php echo htmlentities($DateTime); ?></span></small>
                    <span style="float:right;" class="badge badge-dark text-light">Comments
                    <?php 
                    echo ApproveCommentsPost($postId);
                    ?>              
                
                </span>
                    <hr>
                    <p class="card-text"> <?php 
                    if (strlen($postDescripton)>250){
                        $postDescripton = substr($postDescripton,0,250)."......";
                    }
                    echo $postDescripton; ?></p>
                    <a href="FullPost.php?id=<?php echo $postId; ?>"style="float:right;">
                    <span class="btn btn-info">Read More >></span>
                </a>
                </div>
            </div>
            <?php } ?>
            <!-- pagination  -->
            <nav>
                <ul class="pagination pagination-lg">
                    <!-- backward button  -->
                      <?php 
                    if(isset($page)){
                        if($page>1){

                    ?>
                    <li class="page-item">
                        <a href="Blog.php?page=<?php echo $page-1; ?>" class="page-link">&laquo;</a>
                    </li>
                    <?php } } ?>
                    <?php
                    global $con;
                    $sql = "select count(*) from posts";
                    $result=mysqli_query($con,$sql);
                    $row_count = mysqli_fetch_assoc($result);
                    $totalpost = array_shift($row_count);
                    // echo $totalpost."<br>";
                    $postpagination = $totalpost/4;
                    $postpagination=floor($postpagination);
                    // echo $postpagination;
                    for($i=1;$i<=$postpagination;$i++){
                        if(isset($page)){ 
                            if($i==$page){ ?>
                                <li class="page-item active">
                        <a href="Blog.php?page=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a>
                    </li>
                    <?php 
                    }else{
                      ?>  <li class="page-item">
                        <a href="Blog.php?page=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a>
                    </li>
                    <?php
                    } }}
                    
                            ?>

                        
                    
                    
                    <?php  ?>
                    <!-- creating forward button  -->
                    <?php 
                    if(isset($page)&&!empty($page)){
                        if($page+1<=$postpagination){

                    ?>
                    <li class="page-item">
                        <a href="Blog.php?page=<?php echo $page+1; ?>" class="page-link">&raquo;</a>
                    </li>
                    <?php } } ?>
                </ul>
            </nav>
            </div>
            <!-- side area  -->
            
 <?php include ("footer.php");?>   