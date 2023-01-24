<!--Server side code to handle  Patient Registration-->
<?php
	session_start();
	include('assets/inc/config.php');
		if(isset($_POST['update_payroll']))
		{
			$pay_number = $_GET['pay_number'];
			$pay_doc_name = $_POST['pay_doc_name'];
            //$pres_pat_type = $_POST['pres_pat_type'];
            $pay_doc_number = $_POST['pay_doc_number'];
            $pay_doc_email = $_POST['pay_doc_email'];
            $pay_emp_salary = $_POST['pay_emp_salary'];
            $pay_descr = $_POST['pay_descr'];
            $pay_status = $_POST['pay_status'];
            //$mdr_pat_ailment = $_POST['mdr_pat_ailment'];
            //sql to insert captured values
			$query="UPDATE   his_payrolls SET pay_doc_name=?, pay_doc_number=?, pay_doc_email=?, pay_emp_salary=?, pay_descr=?, pay_status = ? WHERE pay_number = ?";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('sssssss',  $pay_doc_name, $pay_doc_number, $pay_doc_email, $pay_emp_salary, $pay_descr, $pay_status, $pay_number);
			$stmt->execute();
			/*
			*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/ 
			//declare a varible which will be passed to alert function
			if($stmt)
			{
				$success = "Payroll Record Updated ";
			}
			else {
				$err = "Please Try Again Or Try Later";
			}
			
			
		}
?>
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

            <!-- ========== Left Sidebar Start ========== -->
            <?php include("assets/inc/sidebar.php");?>
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
            <?php
                $pay_number = $_GET['pay_number'];
                $ret="SELECT  * FROM his_payrolls WHERE pay_number=?";
                $stmt= $mysqli->prepare($ret) ;
                $stmt->bind_param('s',$pay_number);
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
                            
                            <!-- start page title -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="page-title-box">
                                        <div class="page-title-right">
                                            <ol class="breadcrumb m-0">
                                                <li class="breadcrumb-item"><a href="his_admin_dashboard.php">Dashboard</a></li>
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">Payrolls</a></li>
                                                <li class="breadcrumb-item active">Update Payroll Record</li>
                                            </ol>
                                        </div>
                                        <h4 class="page-title">Update Employee Payroll Record</h4>
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

                                                    <div class="form-group col-md-4">
                                                        <label for="inputEmail4" class="col-form-label">Employee Name</label>
                                                        <input type="text" required="required" readonly name="pay_doc_name" value="<?php echo $row->pay_doc_name;?>" class="form-control" id="inputEmail4" placeholder="Patient's Name">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="inputPassword4" class="col-form-label">Employee Email</label>
                                                        <input required="required" type="text" readonly name="pay_doc_email" value="<?php echo $row->pay_doc_email;?>" class="form-control"  id="inputPassword4" placeholder="Patient`s Last Name">
                                                    </div>

                                                    <div class="form-group col-md-4">
                                                        <label for="inputPassword4" class="col-form-label">Employee Number</label>
                                                        <input required="required" type="text" readonly name="pay_doc_number" value="<?php echo $row->pay_doc_number?>" class="form-control"  id="inputPassword4" placeholder="Patient`s Last Name">
                                                    </div>

                                                </div>

                                                <div class="form-row">

                                                    <div class="form-group col-md-6">
                                                        <label for="inputEmail4" class="col-form-label">Employee Salary ($)</label>
                                                        <input type="text" required="required"  name="pay_emp_salary" value="<?php echo $row->pay_emp_salary;?>" class="form-control" id="inputEmail4" >
                                                    </div>

                                                    <div class="form-group col-md-6">
                                                    <label for="inputState" class="col-form-label">Payroll Status</label>
                                                    <select id="inputState" required="required" name="pay_status" class="form-control">
                                                        <option>Choose</option>
                                                        <option>Paid</option>
                                                        <option>Unpaid</option>
                                                    </select>
                                                </div>

                                                    
                                                </div>
                                               
                                                <hr>
                                                
                                                
                                                <div class="form-group">
                                                        <label for="inputAddress" class="col-form-label">Payroll Description</label>
                                                        <textarea   type="text" class="form-control" name="pay_descr" id="editor"> <?php echo $row->pay_descr;?></textarea>
                                                </div>

                                                <button type="submit" name="update_payroll" class="ladda-button btn btn-primary" data-style="expand-right">Update Payroll Record</button>

                                            </form>
                                            <!--End Patient Form-->
                                        </div> <!-- end card-body -->
                                    </div> <!-- end card-->
                                </div> <!-- end col -->
                                <?php }?>
                            </div>
                            <!-- end row -->

                        </div> <!-- container -->

                    </div> <!-- content -->

                    <!-- Footer Start -->
                    <?php include('assets/inc/footer.php');?>
                    <!-- end Footer -->

                </div>
            

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


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
        
    </body>

</html>