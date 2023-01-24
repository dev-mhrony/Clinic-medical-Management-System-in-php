<!--Server side code to handle  Patient Registration-->
<!-- Author By: MH RONY
Author Website: https://developerrony.com
Github Link: https://github.com/dev-mhrony
Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
--><?php
	session_start();
	include('assets/inc/config.php');
		if(isset($_POST['add_emp_vitals']))
		{
			$vit_number = $_POST['vit_number'];
			$vit_pat_number = $_POST['vit_pat_number'];
            $vit_bodytemp  = $_POST['vit_bodytemp'];
            $vit_heartpulse = $_POST['vit_heartpulse'];
            $vit_resprate  = $_POST['vit_resprate'];
            $vit_bloodpress = $_POST['vit_bloodpress'];
            //$pres_ins = $_POST['pres_ins'];
            //$pres_pat_ailment = $_POST['pres_pat_ailment'];
            //sql to insert captured values
			$query="INSERT INTO  his_vitals  (vit_number, vit_pat_number, vit_bodytemp, vit_heartpulse, vit_resprate, vit_bloodpress) VALUES(?,?,?,?,?,?)";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('ssssss', $vit_number, $vit_pat_number, $vit_bodytemp, $vit_heartpulse, $vit_resprate, $vit_bloodpress);
			$stmt->execute();
			/*
			*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/ 
			//declare a varible which will be passed to alert function
			if($stmt)
			{
				$success = "Employee Vitals Addded";
			}
			else {
				$err = "Please Try Again Or Try Later";
			}
			
			
		}
?>
<!-- Author By: MH RONY
Author Website: https://developerrony.com
Github Link: https://github.com/dev-mhrony
Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
-->
<!--End Server Side-->
<!--End Patient Registration-->
<!DOCTYPE html>
<html lang="en">

<!--Head-->
<?php include('assets/inc/head.php');?>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <?php include("assets/inc/nav.php");?>
        <!-- end Topbar -->
        <!-- Author By: MH RONY
Author Website: https://developerrony.com
Github Link: https://github.com/dev-mhrony
Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
-->
        <!-- ========== Left Sidebar Start ========== -->
        <?php include("assets/inc/sidebar.php");?>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <?php
                $doc_number = $_GET['doc_number'];
                $ret = "SELECT  * FROM his_docs WHERE doc_number=?";
                $stmt= $mysqli->prepare($ret) ;
                $stmt->bind_param('s',$doc_number);
                $stmt->execute() ;//ok
                $res=$stmt->get_result();
                //$cnt=1;
                while($row=$res->fetch_object())
                {
            ?>
        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">
                    <!-- Author By: MH RONY
Author Website: https://developerrony.com
Github Link: https://github.com/dev-mhrony
Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
-->
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="his_admin_dashboard.php">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Laboratory</a></li>
                                        <li class="breadcrumb-item active">Capture Vitals</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Capture <?php echo $row->doc_fname;?> <?php echo $row->doc_lname;?> Vitals</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <!-- Form row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title">Fill all fields</h4>
                                    <!--Add Patient Form-->
                                    <form method="post">
                                        <div class="form-row">

                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4" class="col-form-label">Employee Name</label>
                                                <input type="text" required="required" readonly name="" value="<?php echo $row->doc_fname;?> <?php echo $row->doc_lname;?>" class="form-control" id="inputEmail4" placeholder="Patient's First Name">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="inputPassword4" class="col-form-label">Employee Department</label>
                                                <input required="required" type="text" readonly name="" value="<?php echo $row->doc_dept;?>" class="form-control" id="inputPassword4" placeholder="Patient`s Last Name">
                                            </div>

                                        </div>

                                        <div class="form-row">

                                            <div class="form-group col-md-12">
                                                <label for="inputEmail4" class="col-form-label">Employee Number</label>
                                                <input type="text" required="required" readonly name="vit_pat_number" value="<?php echo $row->doc_number;?>" class="form-control" id="inputEmail4" placeholder="DD/MM/YYYY">
                                            </div>


                                        </div>

                                        <!-- Author By: MH RONY
Author Website: https://developerrony.com
Github Link: https://github.com/dev-mhrony
Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
-->
                                        <hr>
                                        <div class="form-row">


                                            <div class="form-group col-md-2" style="display:none">
                                                <?php 
                                                            $length = 5;    
                                                            $vit_no =  substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);
                                                        ?>
                                                <label for="inputZip" class="col-form-label">Vital Number</label>
                                                <input type="text" name="vit_number" value="<?php echo $vit_no;?>" class="form-control" id="inputZip">
                                            </div>
                                        </div>

                                        <div class="form-row">

                                            <div class="form-group col-md-3">
                                                <label for="inputEmail4" class="col-form-label">Patient Body Temperature °C</label>
                                                <input type="text" required="required" name="vit_bodytemp" class="form-control" id="inputEmail4" placeholder="°C">
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="inputPassword4" class="col-form-label">Patient Heart Pulse/Beat BPM</label>
                                                <input required="required" type="text" name="vit_heartpulse" class="form-control" id="inputPassword4" placeholder="HeartBeats Per Minute ">
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="inputPassword4" class="col-form-label">Patient Respiratory Rate bpm</label>
                                                <input required="required" type="text" name="vit_resprate" class="form-control" id="inputPassword4" placeholder="Breathes Per Minute">
                                            </div>

                                            <div class="form-group col-md-3">
                                                <label for="inputPassword4" class="col-form-label">Patient Blood Pressure mmHg</label>
                                                <input required="required" type="text" name="vit_bloodpress" class="form-control" id="inputPassword4" placeholder="mmHg">
                                            </div>

                                        </div>

                                        <button type="submit" name="add_emp_vitals" class="ladda-button btn btn-success" data-style="expand-right">Add Vitals</button>
                                        <!-- Author By: MH RONY
Author Website: https://developerrony.com
Github Link: https://github.com/dev-mhrony
Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
-->
                                    </form>
                                    <!--End Patient Form-->
                                </div> <!-- end card-body -->
                            </div> <!-- end card-->
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <?php include('assets/inc/footer.php');?>
            <!-- end Footer -->

        </div>
        <?php }?>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

        <!-- Author By: MH RONY
Author Website: https://developerrony.com
Github Link: https://github.com/dev-mhrony
Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
-->
    </div>
    <!-- END wrapper -->


    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>
    <script src="//cdn.ckeditor.com/4.6.2/basic/ckeditor.js"></script>
    <script type="text/javascript">
    CKEDITOR.replace('editor')
    </script>

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- App js-->
    <script src="assets/js/app.min.js"></script>

    <!-- Loading buttons js -->
    <script src="assets/libs/ladda/spin.js"></script>
    <script src="assets/libs/ladda/ladda.js"></script>

    <!-- Buttons init js-->
    <script src="assets/js/pages/loading-btn.init.js"></script>
    <!-- Author By: MH RONY
Author Website: https://developerrony.com
Github Link: https://github.com/dev-mhrony
Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
-->
</body>

</html>