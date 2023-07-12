
<?php 
include('Includes/db.php');
include('Includes/function.php');
include('includes/sessions.php');
?>
<?php
$search = $_GET['id'];

if(isset($_POST["submit"])){
    // echo "<pre>";
    // print_r($_POST);
    // die();
    $name =$_POST['name'];
    $email=$_POST['email'];
    $comment=$_POST['commenterthoughts'];
    
    date_default_timezone_set("Asia/Kolkata");
    $currentTime = time();
    $DateTime=strftime("%B-%d-%y %H:%M:%S",$currentTime);

    if(empty($name) || empty($email) || empty($comment)){
        
        $_SESSION["ErrorMessage"] = "All fields must be filled out";
        Redirect_to("FullPost.php?id=$search");
    }elseif(strlen($comment)>500){
        $_SESSION["ErrorMessage"] = "Comment length should be less than 500 characters";
        Redirect_to("FullPost.php?id=$search");

    }
    else{
        // Insert comment
        global $con;
        $sql = "insert into comments(datetime,name,email,comment,approveby,status,post_id)values('$DateTime','$name','$email','$comment','pending','OFF','$search')";
        $result = mysqli_query($con,$sql);
        // var_dump($result);
        if($result){
            $_SESSION["SuccessMessage"]="Comment submitted Successfully";
            Redirect_to("FullPost.php?id=$search");
        }else{
            $_SESSION["ErrorMessage"]='Something went wrong.Try Again !';
            Redirect_to("FullPost.php?id=$search");
        }

        
    }
}



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
            <h1 class="lead">The Complete Blog by using PHP by Kashyap</h1>
            <?php 
            echo ErrorMessage();
            echo SuccessMessage();
            ?>
            
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
               }
               // The default sql query

            else{
                $PostIdFromURL = $_GET["id"];
                // if(!isset($php_errormsg)){
                //     $_SESSION["ErrorMessage"] = "Bad Request!";
                //     Redirect_to("Blog.php");
                // }
                $sql = "select * from posts where id = '$PostIdFromURL'";
                $result=mysqli_query($con,$sql);
                $row_count = mysqli_num_rows($result);
                if($row_count!=1){
                    $_SESSION["ErrorMessage"] = "Bad Request!";
                    Redirect_to("Blog.php?page=1");
                }
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
                    
                    <!-- <small class="text-muted">Category:<span class="text-dark"><?php echo htmlentities($category); ?></span> & Written by <span class="text-dark"><?php echo htmlentities($Admin); ?></span> on <span class="text-dark"><?php echo htmlentities($DateTime); ?></span></small> -->
                    <!-- <small class="text-muted">Written by <?php echo htmlentities($Admin); ?> on <?php echo htmlentities($DateTime); ?></small> -->
                    <!-- <span style="float:right;" class="badge badge-dark text-light">Comments 
                    <?php 
                    echo ApproveCommentsPost($postId);
                    ?>    </span> -->
                    <hr>
                    <p class="card-text">  
                     <!--  <?php echo nl2br($postDescripton); ?>    -->
                    <?php echo htmlentities($postDescripton); ?> 
                </p>
                </div>
            </div>
            <?php } ?>
            <!-- comment part  -->
            <!-- Fecthing existing comment  -->
            <span class="FieldInfo">Comments</span>
            <br><br>
            <?php
            global $con;
            $sql = "select * from comments where post_id='$search' and status='ON'";
            $result=mysqli_query($con,$sql);
            // var_dump($result);
            while($rows=mysqli_fetch_assoc($result)){
                $commentdate = $rows['datetime'];
                $name= $rows['name'];
                $comment =$rows['comment'];
            
            
            ?>
            <div>
                
                <div class="media CommentBlock">
                    <img class="d-block img-fluid align-self-start" src="images/user.png" alt="">
                    <div class="media-body ml-2">
                    <h6 class=lead><?php  echo $name;?></h6>
                    <p class="small"><?php echo $commentdate;?></p>
                    <p><?php echo $comment; ?></p>
                    </div>
                </div>
            </div>
            
            <hr>
            <?php } ?>
            <!-- Fecthing existing comment -->
            <div>
                <form action="FullPost.php?id=<?php echo $search; ?>" method="post"> 
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="FieldInfo">Share your thoughts about this post</h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                            <input class="form-control"type="text"name="name"placeholder="Name"value="">
            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                            <input class="form-control"type="email"name="email"placeholder="Email"value="">
            </div>
                        </div>
                        <div class="form-group">
                            <textarea name="commenterthoughts"class="form-control" cols="30" rows="8"></textarea>
                        </div>
                        <div class="">
                        <button type="submit"name="submit"class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <!-- comment end  -->
            </div>
            
            <?php include ("footer.php");?>  