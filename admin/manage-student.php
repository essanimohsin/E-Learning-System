<?php
	session_start();
	error_reporting(0);
	include('../database.php');
	if(strlen($_SESSION['userid'] == 0)) 
	{
  		header('location:logout.php');
  	}
?>

<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    
    <title>View Students</title>
    
    <link rel="apple-touch-icon" href="apple-icon.png">

    <!-- Font Awesome -->
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">

    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="../assets/css/styles.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <script src="../assets/js/sweetalert.js"></script>

</head>

<body>
    <!-- Left Panel -->

    <?php include_once('includes/sidebar.php');?>

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include_once('includes/header.php');?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>View Students</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="manage-teacher.php">Manage Staff</a></li>
                            <li class="active">View Students</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">View Students</strong>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                  							<th>SR NO</th>
                  							<th>Student Name</th>
                  							<th>Student Picture</th>
                  							<th>Student Email</th>
                  							<th>Mobile</th>
                  							<th>Placement Status</th>
                  							<th>Action</th>
                						</tr>
                                    </thead>
                                    <?php
										$sql = "SELECT * from student WHERE disable = 0 ORDER BY joiningDate";
										$query = mysqli_query($con, $sql);
										$results = mysqli_fetch_all($query, MYSQLI_ASSOC);
										$cnt=1;
										if(mysqli_num_rows($query) > 0)
										{
											foreach($results as $row)
											{ 
									?>   
								                <tr>
								                  	<td><?php  echo htmlentities($cnt);?></td>
								                  	<td><?php  echo htmlentities($row['name']);?></td>
								                  	<td><img src="../assets/img/profile/<?php echo $row['profilePic'];?>" height="100"></td>
								                  	<td><?php  echo htmlentities($row['email']);?></td>
								                  	<td><?php  echo htmlentities($row['mobile']);?></td>
								                  	<?php if(!empty($row['placement'])) 
								                  			{
								                  	?>
								                  				<td><?php  echo htmlentities($row['placement']);?></td>
								                  	<?php 	}
								                  			else
								                  			{  
								                  	?>			
								                  				<td align="center" style="color:red"><span class="fas fa-close"></span>&nbsp;Not Available</td>
								                	<?php 	}  
								                	?>
								                	<td>
			                                            <input type="hidden" name="id" value="<?php echo $row['id'];?>" class="delete_id_value">
			                                            <a href="javascript:void(0)" class="btn btn-danger delete_btn_ajax"> <i class="fa fa-trash"></i> </a>
			                                        </td>
								                </tr>
									<?php $cnt=$cnt+1;
											}
										} 
									?>   
                                </table>
                            </div>
                        </div>
                    </div>



                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->
    <!-- Right Panel -->

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/mains.js"></script>

    <script>
        jQuery(document).ready(function($){
          $('.delete_btn_ajax').click(function(e){
                e.preventDefault();
                var deleteid = $(this).closest("tr").find('.delete_id_value').val();
                swal({
                      title: "Are you sure?",
                      text: "Once deleted, you will not be able to recover this student!",
                      icon: "warning",
                      buttons: true,
                      dangerMode: true,
                    })
                    .then((willDelete) => {
                      if (willDelete) {
                        $.ajax({
                            type: "POST",
                            url: "backend.php",
                            data: {
                                "delete_student_set" : 1,
                                "delete_id" : deleteid,
                            },
                            success: function(response)
                            {
                                swal("Student Deleted Successfully!",{
                                   icon: "success",
                                }).then((result) => {
                                  location.reload();
                                });
                            }
                        });
                      }
                    });
            });
        });
    </script>

</body>
</html>