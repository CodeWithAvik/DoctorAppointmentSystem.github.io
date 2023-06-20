<?php
session_start();
include_once '../assets/conn/dbconnect.php';
// include_once 'connection/server.php';
if(!isset($_SESSION['doctorSession']))
{
header("Location: ../index.php");
}
$usersession = $_SESSION['doctorSession'];
$res=mysqli_query($con,"SELECT * FROM doctor WHERE icDoctor=".$usersession);
$userRow=mysqli_fetch_array($res,MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Welcome <?php echo $userRow['doctorFirstName'];?> <?php echo $userRow['doctorLastName'];?></title>
        <!-- Bootstrap Core CSS -->
        <!-- <link href="assets/css/bootstrap.css" rel="stylesheet"> -->
        <link href="assets/css/material.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="assets/css/sb-admin.css" rel="stylesheet">
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
        <!-- Custom Fonts -->
    </head>
    <body>
        <div>
            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="doctordashboard.php">Welcome  <?php echo $userRow['doctorFirstName'];?> <?php echo $userRow['doctorLastName'];?></a>
                </div>
                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $userRow['doctorFirstName']; ?> <?php echo $userRow['doctorLastName']; ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="logout.php?logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- navbar-collapse -->
            </nav>
            <!-- navigation end -->
            <div id="page-wrapper" style="background-image:url('assets/img/bac_doc.jpg'); background-size:cover; background-attachment:fixed; background-repeat:no-repeat;">
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="page-header">
                            All Appointments
                            </h2>
                        </div>
                    </div>
                    <!-- Page Heading end-->

                    <!-- panel start -->
                    <div class="panel panel-primary filterable">
                        <!-- Default panel contents -->
                       <div class="panel-heading">
                        <h3 class="panel-title">Appointment List</h3>
                        <div class="pull-right">
                        </div>
                        </div>
                        <div class="panel-body">
                        <!-- Table -->
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th><h4> Patient Ic</h4></th>
                                    <th><h4> Name</h4></th>
                                    <th><h4> Contact No.</h4></th>
                                    <th><h4> Email</h4></th>
                                    <th><h4> Day</h4></th>
                                    <th><h4> Date</h4></th>
                                    <th><h4> Start Time</h4></th>
                                    <th><h4> End Time</h4></th>
                                </tr>
                            </thead>
                            
                             <?php 
                            $res=mysqli_query($con,"SELECT a.*, b.*,c.*
                                                    FROM patient a
                                                    JOIN appointment b
                                                    On a.icPatient = b.patientIc
                                                    JOIN doctorschedule c
                                                    On b.scheduleId=c.scheduleId
                                                    Order By appId desc");
                                  if (!$res) {
                                    printf("Error: %s\n", mysqli_error($con));
                                    exit();
                                }
                            while ($appointment=mysqli_fetch_array($res)) {
                                
                                // if ($appointment['status']=='process') {
                                //     $status="danger";
                                //     $icon='remove';
                                //     $checked='';

                                // } else {
                                //     $status="success";
                                //     $icon='ok';
                                //     $checked = 'disabled';
                                // }
                                echo "<tbody>";
                                // echo "<tr class='$status'>";
                                    echo "<td>" . $appointment['patientIc'] . "</td>";
                                    echo "<td>" . $appointment['patientFirstName'] . "</td>";
                                    echo "<td>" . $appointment['patientLastName'] . "</td>";
                                    echo "<td>" . $appointment['patientEmail'] . "</td>";
                                    echo "<td>" . $appointment['scheduleDay'] . "</td>";
                                    echo "<td>" . $appointment['scheduleDate'] . "</td>";
                                    echo "<td>" . $appointment['startTime'] . "</td>";
                                    echo "<td>" . $appointment['endTime'] . "</td>"; 
                            } 
                                echo "</tr>";
                           echo "</tbody>";
                       echo "</table>";
                       echo "<div class='panel panel-default'>";
                       echo "<div class='col-md-offset-3 pull-right'>";
                        echo "</div>";
                        echo "</div>";
                        ?>
                    </div>
                </div>
                    <!-- panel end -->
<script type="text/javascript">
// function chkit(uid, chk) {
//    chk = (chk==true ? "1" : "0");
//    var url = "checkdb.php?userid="+uid+"&chkYesNo="+chk;
//    if(window.XMLHttpRequest) {
//       req = new XMLHttpRequest();
//    } else if(window.ActiveXObject) {
//       req = new ActiveXObject("Microsoft.XMLHTTP");
//    }
//    // Use get instead of post.
//    req.open("GET", url, true);
//    req.send(null);
// }
</script>


 
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->


       
        <!-- jQuery -->
        <script src="../patient/assets/js/jquery.js"></script>
        <script type="text/javascript">
// $(function() {
// $(".delete").click(function(){
// var element = $(this);
// var appid = element.attr("id");
// var info = 'id=' + appid;
// if(confirm("Are you sure you want to delete this?"))
// {
//  $.ajax({
//    type: "POST",
//    url: "deleteappointment.php",
//    data: info,
//    success: function(){
//  }
// });
//   $(this).parent().parent().fadeOut(300, function(){ $(this).remove();});
//  }
// return false;
// });
// });
</script>
        <!-- Bootstrap Core JavaScript -->
        <script src="../patient/assets/js/bootstrap.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
         <!-- script for jquery datatable start-->
        <script type="text/javascript">
            /*
            Please consider that the JS part isn't production ready at all, I just code it to show the concept of merging filters and titles together !
            */
            // $(document).ready(function(){
            //     $('.filterable .btn-filter').click(function(){
            //         var $panel = $(this).parents('.filterable'),
            //         $filters = $panel.find('.filters input'),
            //         $tbody = $panel.find('.table tbody');
            //         if ($filters.prop('disabled') == true) {
            //             $filters.prop('disabled', false);
            //             $filters.first().focus();
            //         } else {
            //             $filters.val('').prop('disabled', true);
            //             $tbody.find('.no-result').remove();
            //             $tbody.find('tr').show();
            //         }
            //     });

            //     $('.filterable .filters input').keyup(function(e){
            //         /* Ignore tab key */
            //         var code = e.keyCode || e.which;
            //         if (code == '9') return;
            //         /* Useful DOM data and selectors */
            //         var $input = $(this),
            //         inputContent = $input.val().toLowerCase(),
            //         $panel = $input.parents('.filterable'),
            //         column = $panel.find('.filters th').index($input.parents('th')),
            //         $table = $panel.find('.table'),
            //         $rows = $table.find('tbody tr');
            //         /* Dirtiest filter function ever ;) */
            //         var $filteredRows = $rows.filter(function(){
            //             var value = $(this).find('td').eq(column).text().toLowerCase();
            //             return value.indexOf(inputContent) === -1;
            //         });
            //         /* Clean previous no-result if exist */
            //         $table.find('tbody .no-result').remove();
            //         /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
            //         $rows.show();
            //         $filteredRows.hide();
            //         /* Prepend no-result row if all rows are filtered */
            //         if ($filteredRows.length === $rows.length) {
            //             $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
            //         }
            //     });
            // });
        </script>
        <!-- script for jquery datatable end-->

    </body>
</html>