<?php
include_once 'assets/conn/dbconnect.php';
//include_once 'assets/conn/server.php';
?>


<!-- login -->
<!-- check session -->
<?php
session_start();
// session_destroy();
if (isset($_SESSION['doctorSession']) != "") {
header("Location: doctor/doctordashboard.php");
}
if (isset($_POST['login']))
{
$icDoctor = mysqli_real_escape_string($con,$_POST['icDoctor']);
$password  = mysqli_real_escape_string($con,$_POST['password']);

$res = mysqli_query($con,"SELECT * FROM doctor WHERE icDoctor = '$icDoctor'");
$row=mysqli_fetch_array($res,MYSQLI_ASSOC);
if ($row['password'] == $password)
{
$_SESSION['doctorSession'] = $row['icDoctor'];
?>
<script type="text/javascript">
alert('Login Success');
</script>
<?php
header("Location: doctor/doctordashboard.php");
} else {
?>
<script>
alert('wrong input ');
</script>
<?php
}
}
?>
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
                    <h1>Doctor Login</h1>
                    <div id="output"></div>
                    <div><img src="assets/img/davatar.jpg" height="360" width="360" alt="avatar"></div>
                    <div class="form-box">
                        <form class="form" role="form" method="POST" accept-charset="UTF-8">
                            <input name="icDoctor" type="text" placeholder="Doctor's IC" required>
                            <input name="password" type="password" placeholder="Password" required>
                            <button class="btn btn-info btn-block login" type="submit" name="login">Login</button>
                        </form>
                        <a href="index.php"><button class="btn btn-danger btn-block login" type="submit" name="cancel">Back</button></a>
                    </div>
                </div>
            <!-- end -->
        </div>
    </body>
</html>