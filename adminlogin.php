<?php
include_once 'assets/conn/dbconnect.php';
//include_once 'assets/conn/server.php';
?>


<!-- admin login start -->
<!-- check session -->
<?php
session_start();
// session_destroy();
// if (isset($_SESSION['adminSession']) != "") {
// header("location: admin/admin.php");
// }
?>

<!-- admin login end -->


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Login</title>
        <!-- Bootstrap -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/style.css" rel="stylesheet">
    </head>
    <body style="background-image:url('assets/img/med.jpg'); background-size:cover; background-attachment:fixed; background-repeat:no-repeat;">
        <div class="container">
            <!-- start -->
            <div class="container text-center login-container" style="margin:auto; height:50%; width:50%; padding:10px;">
                    <h1>Admin Login</h1>
                    <div id="output"></div>
                    <div><img src="assets/img/davatar.jpg" class="avatar" height="360" width="360" alt=""></div>
                    <div class="form-box">
                        <form class="form" role="form" method="post">
                            <input name="icAdmin" type="text" placeholder="Admin IC" required>
                            <input name="password" type="password" placeholder="Password" required>
                            <input type="submit" name="login" value="Login" class="btn btn-info btn-block login">
                            <!-- <button  type="submit" name="login" id="login">Login</button> -->
                        </form>
                        <?php
                        if(isset($_POST['login']))
                        {
                            $icAdmin = mysqli_real_escape_string($con,$_POST['icAdmin']);
                            $pass  = mysqli_real_escape_string($con,$_POST['password']);

                            $res = mysqli_query($con,"SELECT * FROM admin WHERE icAdmin = '$icAdmin' AND password='$pass'");

                            if (mysqli_num_rows($res)>0 )
                            {
                                // echo "Data Found";
                                $row=mysqli_fetch_assoc($res);
                                $_SESSION['adminSession'] = $row['icAdmin'];
                                // print_r($_SESSION['adminSession']);
                                header("location:admin/admin.php");
                            } 
                            // else {
                            // ?>
                            // <script>
                            // alert('wrong input ');
                            // </script>
                            // <?php
                            // }
                        }
                        ?>
                        <!-- <a href="index.php"><button class="btn btn-danger btn-block login" type="submit" name="cancel">Back</button></a> -->
                    </div>
                </div>
            <!-- end -->
        </div>
    </body>
</html>