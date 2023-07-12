            <div class="col-sm-4">
            <div class="card mt-4">
            <img src="images/blog.jpg" class="d-block img-fluid mb-3" alt="">
            <div class="text-center">
             Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti suscipit voluptatibus inventore alias facilis quo ipsum laudantium, quis eveniet nam odio culpa sapiente magni dignissimos accusantium dolores fuga quisquam? Animi.
            </div>
            </div>
         <br>
        <div class="card">
            <div class="card-header bg-dark text-light mb-4">
                <h2 class="lead">Sign Up</h2>
                        </div>
            <div class="body">
                <button type="button"class="btn btn-success btn-block text-center text-white mb-4"name="button">Join The Forum</button>
                <button type="button"class="btn btn-danger btn-block text-center text-white mb-4"name="button">Login</button>
                <div class="input-group mb-3">
                    <input type="text" class="form-control"name=""placeholder="Enter Your Email"value="">
                    <div class="input-group-append">
                        <button type="button"class="btn btn-primary btn-sm text-center text-white"name="button">Subscribe Now</button>
                    </div>
                </div>

            </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-header bg-primary text-light">
                        <h2 class="lead">Categories</h2>
                        </div>
                        <div class="card-body">
                            <?php
                            global $con;
                            $sql = "select * from category order by id desc";
                            $result =mysqli_query($con,$sql);
                            while($rows=mysqli_fetch_assoc($result)){
                                $categoryId = $rows['id'];
                                $categoryname=$rows['title'];
                            ?>
                            <a href="Blog.php?category=<?php echo $categoryname; ?>"><span class="heading"><?php  echo $categoryname; ?></span></a><br>
                            <?php  } ?>
                        
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-header bg-info text-white">
                        <h2 class="lead">Recent Posts</h2>
                    </div>
                    <div class="card-body">
                        <?php 
                        
                        global $con;
                        $sql ="select * from posts order by id desc limit 0,5";
                        $result = mysqli_query($con,$sql);
                        while($rows=mysqli_fetch_assoc($result)){
                            $id=$rows['id'];
                            $title=$rows['title'];
                            $DateTime = $rows['datetime'];
                            $image= $rows['image'];
                        
                        
                        
                        ?>
                        <div class="media">
                            <img src="Uploads/<?php echo htmlentities($image); ?>" class="d-block img-fluid align-self-start" width="90" height="94"alt="">
                            <div class="media-body ml-2">
                            <a href="FullPost.php?id=<?php echo htmlentities($id); ?>"target="_blank"><h6 class="lead"><?php echo htmlentities($title); ?></h6></a>
                            <p class="small"><?php echo htmlentities($DateTime); ?></p>
                            </div>
                        </div>
                        <hr>

                        <?php } ?>
                    </div>
                </div>
        </div>
            <!-- side area end  -->
        </div>
    </div>
    <!-- header End -->
    
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
<!-- cut the code in side bar  -->
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
    $Existingname = $rows['aname'];
    $Existingusername =$rows['username'];
    $Existingheadline =$rows['aheading'];
    $Existingbio =$rows['abio'];
    $Existingimage =$rows['aimage'];
}
// fetching the existing admin data end 
if(isset($_POST["submit"])){
    $aname =$_POST["name"];
    $aheadline = $_POST['headline'];
    $abio =$_POST['Bio'];
    print_r($_POST);
    die();
    // echo"<pre>";
    // $image=$_FILES['image_name'];

    // $Image=$_FILES["image"]["name"];
    // $target = "Uploads/".basename($_FILES["image"]["name"]);
    $image = $_FILES["image"]["name"];
    // $image_tmp = $_FILES["image"]["tmp_name"];
    if (!isset($_FILES['image'])) {
        // The "image" key is present in the $_FILES array
        $image_name = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
      
        // Rest of your code
      } else {
        // The "image" key is not present in the $_FILES array
        // Handle the error or provide a default action
        echo "Error: No file uploaded";
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