<?php
 require_once('Includes/db.php');
 require_once('Includes/function.php');
 require_once('includes/sessions.php');
if(isset($_SESSION['userid'])){
    Redirect_to("Dashboard.php");
}

if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $password = $_POST['password'];
    if(empty($username) || empty($password)){
        $_SESSION["ErrorMessage"] = "All fields must be filled out";
        Redirect_to("login.php");
    }else{
       $Found_Account =Login_Attempt($username,$password);
       if($Found_Account){
        $_SESSION['userid'] = $Found_Account['id'];
        $_SESSION['username'] = $Found_Account['username'];
        $_SESSION['adminname'] = $Found_Account['aname'];
        $_SESSION['SuccessMessage']="Wellcome ".$_SESSION['adminname']."!";
        if(isset($_SESSION['TrackingURL'])){
            Redirect_to($_SESSION['TrackingURL']);
        }else{
        Redirect_to("Dashboard.php");
        }
       }else{
        $_SESSION['ErrorMessage']="Incorrect Username/Password";
        Redirect_to("login.php");
       }

    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                <h1></h1>
            </div>
            </div>
        </div>
    </header>
    <!-- header End -->
    
    <!-- MAin area  -->
    <section class="container py-2 mb-4">
        <div class="row">
            <div class="offset-sm-3 col-sm-6"style="min-height:400px;">
            <br><br>
            <?php 
            echo ErrorMessage();
            echo SuccessMessage();
            ?>
            <div class="card bg-secondary text-light">
                <div class="card-header">
                    <h4>Wellcome Back !</h4>
</div>
                    <div class="card-body bg-dark">

                    
                    <form action="login.php"method="post">
                        <div class="form-group">
                            <label for="username"><span class="FieldInfo">Username:</span></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-white bg-info"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text"class="form-control"name="username"id="username"value="">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="password"><span class="FieldInfo">Password:</span></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text text-white bg-info"><i class="fas fa-lock"></i></span>
                                </div>
                                <input type="password"class="form-control"name="password"id="password"value="">
                            </div>
                        </div>
                        <input type="submit" name="submit"class="btn btn-info btn-block"value="Login">
                    </form>
                </div>
            </div>
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