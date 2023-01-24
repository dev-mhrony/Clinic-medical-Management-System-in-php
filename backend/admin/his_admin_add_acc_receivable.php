<!--Server side code to handle  Patient Registration-->
<!-- Author By: MH RONY
Author Website: https://developerrony.com
Github Link: https://github.com/dev-mhrony
Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
--><?php
	session_start();
	include('assets/inc/config.php');
		if(isset($_POST['add_acc']))
		{
			$acc_name=$_POST['acc_name'];
			$acc_desc=$_POST['acc_desc'];
			$acc_type=$_POST['acc_type'];
            $acc_number=$_POST['acc_number'];
            $acc_amount=$_POST['acc_amount'];
            //$acc_status=$_POST['acc_status'];

            //sql to insert captured values
			$query="INSERT INTO his_accounts (acc_name, acc_desc, acc_type, acc_number, acc_amount) values(?,?,?,?,?)";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('sssss', $acc_name, $acc_desc, $acc_type, $acc_number, $acc_amount);
			$stmt->execute();
			/*
			*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/ 
			//declare a varible which will be passed to alert function
			if($stmt)
			{
				$success = "Account Receivable Details Added";
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
    <!-- Author By: MH RONY
Author Website: https://developerrony.com
Github Link: https://github.com/dev-mhrony
Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
-->
    <!-- Begin page -->
    <div id="wrapper">
        <!-- Author By: MH RONY
Author Website: https://developerrony.com
Github Link: https://github.com/dev-mhrony
Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
-->
        <!-- Topbar Start -->
        <?php include("assets/inc/nav.php");?>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <?php include("assets/inc/sidebar.php");?>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <!-- Author By: MH RONY
Author Website: https://developerrony.com
Github Link: https://github.com/dev-mhrony
Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
-->
        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="his_admin_dashboard.php">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Accounting</a></li>
                                        <li class="breadcrumb-item active">Add Receivable Account</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Receivable Account Details</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                    <!-- Author By: MH RONY
Author Website: https://developerrony.com
Github Link: https://github.com/dev-mhrony
Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
-->
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
                                                <label for="inputEmail4" class="col-form-label">Account Name</label>
                                                <input type="text" required="required" name="acc_name" class="form-control" id="inputEmail4">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4" class="col-form-label">Account Amount($)</label>
                                                <input type="text" required="required" name="acc_amount" class="form-control" id="inputEmail4">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-2" style="display:none">
                                            <?php 
                                                    $length = 15;    
                                                    $account_number =  substr(str_shuffle('0123456789'),1,$length);
                                                ?>
                                            <label for="inputZip" class="col-form-label">Account Number</label>
                                            <input type="text" name="acc_number" value="<?php echo $account_number;?>" class="form-control" id="inputZip">
                                        </div>
                                        <!-- Author By: MH RONY
Author Website: https://developerrony.com
Github Link: https://github.com/dev-mhrony
Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
-->
                                        <div class="form-group ">
                                            <label for="inputPassword4" class="col-form-label">Account Description</label>
                                            <textarea required="required" type="text" name="acc_desc" class="form-control" id="editor"></textarea>
                                        </div>

                                        <div class="form-group" style="display:none">
                                            <label for="inputAddress" class="col-form-label">Account Type</label>
                                            <input required="required" value="Receivable Account" type="text" class="form-control" name="acc_type" id="inputAddress">
                                        </div>

                                        <button type="submit" name="add_acc" class="ladda-button btn btn-success" data-style="expand-right">Add Account</button>

                                    </form>
                                    <!--End Patient Form-->
                                </div> <!-- end card-body -->
                            </div> <!-- end card-->
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- container -->

            </div> <!-- content -->
            <!-- Author By: MH RONY
Author Website: https://developerrony.com
Github Link: https://github.com/dev-mhrony
Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
-->
            <!-- Footer Start -->
            <?php include('assets/inc/footer.php');?>
            <!-- end Footer -->

        </div>

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
<!-- Author By: MH RONY
Author Website: https://developerrony.com
Github Link: https://github.com/dev-mhrony
Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
-->

</html>