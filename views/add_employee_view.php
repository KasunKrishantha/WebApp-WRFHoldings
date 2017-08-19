<?php include "includes/header.php" ?>
<?php include "includes/sidebar.php" ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

<!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Employee Information
            <!--<small><?php echo $outletName ;?></small>-->
        </h1>

        <ol class="breadcrumb">
            <li><a href="home_dashboard.php"><i class="fa fa-dashboard"></i> Home</a></li>            
            <li class="active">Employees</li>
        </ol>
    </section>

<!-- Main content -->
<section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-xs-12 col-lg-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Register new employees</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->

                    
                    <form role="form" action="<?php echo base_url()?>index.php/EmployeeController/addEmployee" method="POST">
                        <div class="box-body">

                        <div class="col-xs-12 col-lg-12 col-sm-12">

                            <div class="col-sm-4 col-xs-12">
                            	<div class="form-group">
                                    <label for="empId">Employee ID</label>
                                    <input type="text" class="form-control"  name="empId" placeholder="Employee ID" required>
                                </div>
                            </div>

                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="fullName">Full name</label>
                                    <input type="text" class="form-control"  name="fullName" placeholder="Full name" required>
                                </div>
                            </div>

                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="nameWithInitials">Name with initials</label>
                                    <input type="text" class="form-control"  name="nameWithInitials" placeholder="Name with initials" required>
                                </div>
                            </div>

                        </div>

                        <div class="col-xs-12 col-lg-12 col-sm-12">

                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="nic">NIC No</label>
                                    <input type="text" class="form-control"  name ="nicNumber" placeholder="NIC No" required>
                                </div>
                            </div>

                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group">
    				                <label>Date of birth</label>

    				                <div class="input-group date">
    				                  <div class="input-group-addon">
    				                    <i class="fa fa-calendar"></i>
    				                  </div>
    				                  <input type="text" class="form-control pull-right" id="datepicker" name="dateOfBirth" required>
    				                </div>
    				                <!-- /.input group -->
    				            </div>
                            </div>

                            <div class="col-sm-4 col-xs-12">

    				            <!-- /.form group -->
                                <div class="form-group">
                                    <label>Select Outlet</label>
                                    <select class="form-control" name="outletName" required>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="col-xs-12 col-lg-12 col-sm-12">
				            
                            <div class="col-sm-4 col-xs-12">
                                <!-- /.form group -->
                                <div class="form-group">
                                    <label>Select position</label>
                                    <select class="form-control" name="position" required>
                                        <option>Outlet Supervisor </option>
                                        <option>Delivery driver</option>
                                        <option>Collection officer</option>
                                        <option>Computer operators</option>
                                        <option>Sales representatives</option>
                                        <option>DSS</option>
                                        <option>Porters</option>
                                        <option>Other</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-4 col-xs-12">

                                <div class="form-group">
    				                <label>Joined Date</label>

    				                <div class="input-group date">
    				                  <div class="input-group-addon">
    				                    <i class="fa fa-calendar"></i>
    				                  </div>
    				                  <input type="text" class="form-control pull-right" id="datepicker" name="joinedDate">
    				                </div>
    				                <!-- /.input group -->
    				            </div>
                            </div>

                            <div class="col-sm-4 col-xs-12">

                                <div class="form-group">
                                    <label>Contact number</label>

                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-phone"></i>
                                        </div>
                                        <input type="text" class="form-control" required="required" name="contactNumber" data-inputmask='"mask": "(94) 99 9 999999"' data-mask>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-lg-12 col-sm-12">

                            <div class="col-sm-4 col-xs-12">

                                <div class="form-group">
                                    <label for="address">Home address</label>
                                    <input type="text" class="form-control"  name="address" placeholder="Home address">
                                </div>

                            </div>

                            <div class="col-sm-4 col-xs-12">

                                <div class="form-group">
                                    <label for="email">Email(If any)</label>
                                    <input type="email" class="form-control"   name="email" placeholder="Email">
                                </div>
                            </div>

                        </div>

                            <div class="col-xs-2">
                                <button type="submit" class="btn btn-block btn-success" name="register">Submit</button>
                            </div>

                        </div>
                    </form>


                </div>
            </div>

        </div>

    </section>
    <!-- /.content -->




</div>
<!-- /.content-wrapper -->



<?php include "includes/footer.php";?>

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="<?php echo base_url()?>template/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url()?>template/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url()?>template/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>template/dist/js/adminlte.min.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url()?>template/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script >
	$(function() {
		//Date picker
	    $('#datepicker').datepicker({
	      autoclose: true
	    })
	})

</script>

