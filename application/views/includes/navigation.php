<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 5/18/2020
 * Time: 11:00 AM
 */
?>
<head>

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/notification/notification.css">


</head>

<body>

<!-- Mobile Menu start -->
<div class="mobile-menu-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="mobile-menu">
                    <nav id="dropdown">
                        <ul class="mobile-menu-nav">
                            <li><a data-target="#Charts"
                                   href="<?php echo base_url(); ?>index.php/page_controller/dashboardView">Home</a>
                            </li>
                            <li><a data-toggle="collapse" data-target="#demoevent" href="#">Work Assign</a>
                                <ul id="demoevent" class="collapse dropdown-header-top">
                                    <li><a href="">Newly Assign</a></li>
                                    <li><a href="">Work Wheel</a></li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#democrou" href="#">Leaves</a>
                                <ul id="democrou" class="collapse dropdown-header-top">
                                    <li><a href="">Apply Leave</a></li>
                                    <li><a href="">Leave History</a></li>
                                    <li><a href="">Print Leave</a></li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#demolibra" href="#">Reports</a>
                                <ul id="demolibra" class="collapse dropdown-header-top">
                                    <li><a href="">Leave History Report</a></li>
                                    <li><a href="">Work Assign Report</a></li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#demodepart" href="#"> User Management</a>
                                <ul id="demodepart" class="collapse dropdown-header-top">
                                    <li><a href="">Add Employee</a></li>
                                    <li><a href="">Manage Employee</a></li>
                                    <li><a href="">Create Login</a></li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#Miscellaneousmob" href="#"> Leave Management</a>
                                <ul id="Miscellaneousmob" class="collapse dropdown-header-top">
                                    <li><a href="">All Leaves</a>
                                    </li>
                                    <li><a href="">Pending Leaves</a>
                                    </li>
                                    <li><a href="">Approved Leaves</a>
                                    </li>
                                    <li><a href="">Not Approved Leaves</a>
                                    </li>
                                    <li><a href="">Add / Manage Leaves</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a data-toggle="collapse" data-target="#Pagemob" href="#">Admin Control</a>
                                <ul id="Pagemob" class="collapse dropdown-header-top">
                                    <li><a href="">Add Office</a>
                                    </li>
                                    <li><a href="">Add Department</a>
                                    </li>
                                    <li><a href="">Add Designations</a>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mobile Menu end -->
<!-- Main Menu area start-->
<!--style="position:fixed; width: 100%; z-index:5; top:40px; background:#F6F8FA;"-->
<div class="main-menu-area mg-tb-40"
     style="position:fixed; width: 100%; top: 0; z-index:8; top:25px; background:#F6F8FA; padding-bottom: 10px; padding-top: 10px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                    <li class="active"><a href="<?php echo base_url(); ?>index.php/page_controller/dashboardView"><i
                                    class="notika-icon notika-house"></i> Home</a>
                    </li>
                    <li><a data-toggle="tab" href="#mailbox"><i class="notika-icon notika-support"></i>Work Assign</a>
                    </li>
                    <li><a data-toggle="tab" href="#Interface"><i class="notika-icon notika-edit"></i> Leaves</a>
                    </li>
                    <li><a data-toggle="tab" href="#Charts"><i class="notika-icon notika-bar-chart"></i> Reports</a>
                    </li>
                    <li><a data-toggle="tab" href="#Tables"><i class="notika-icon notika-windows"></i> User
                            Management</a>
                    </li>
                    <li><a data-toggle="tab" href="#Forms"><i class="notika-icon notika-form"></i> Leave Management</a>
                    </li>
                    <li><a data-toggle="tab" href="#Page"><i class="notika-icon notika-app"></i> Admin Control</a>
                    </li>
                </ul>
                <div class="tab-content custom-menu-content">
                    <div id="mailbox" class="tab-pane notika-tab-menu-bg animated flipInX">
                        <ul class="notika-main-menu-dropdown">

                            <?php if ($_SESSION['user_role'] == 3) { ?>

                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/work_assign_control/engage_task_controller/engageTaskView">Newly
                                        Assign</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/work_assign_control/work_wheel_controller/workWheelView">Work
                                        Weel</a>
                                </li>


                            <?php } elseif ($_SESSION['user_role'] == 1) { ?>

                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/work_assign_control/work_assign_controller/workAssignView">Assign
                                        Task</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/work_assign_control/work_summary_controller/workSummaryView">Work
                                        Summary</a>
                                </li>

                            <?php } else { ?>

                                <li>
                                    <div class="notification-demo mg-t-20">
                                        <a href="" class="btn" data-type="danger">Newly Assign</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="notification-demo mg-t-20">
                                        <a href="" class="btn" data-type="danger">Work Weel</a>
                                    </div>

                                </li>
                            <?php } ?>

                        </ul>
                    </div>

                    <?php if ($_SESSION['user_role'] == 3){ ?>
                    <div id="Interface" class="tab-pane active notika-tab-menu-bg animated flipInX">

                        <?php } else { ?>
                        <div id="Interface" class="tab-pane notika-tab-menu-bg animated flipInX">

                            <?php } ?>
                            <ul class="notika-main-menu-dropdown">

                                <?php if ($_SESSION['user_role'] == 3) { ?>

                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/apply_leave_controller/applyLeaveView">Apply
                                            Leave</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/leavehsty_controller/leaveHistoryView">Leave
                                            History</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/print_leave_controller/printLeaveView">Print
                                            Leave</a>
                                    </li>

                                <?php } else { ?>

                                    <li>
                                        <div class="notification-demo mg-t-20">
                                            <a href="" class="btn" data-type="danger">Apply Leave</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="notification-demo mg-t-20">
                                            <a href="" class="btn" data-type="danger">Leave History</a>
                                        </div>

                                    </li>
                                    <li>
                                        <div class="notification-demo mg-t-20">
                                            <a href="" class="btn" data-type="danger">Print Leave</a>
                                        </div>

                                    </li>

                                <?php } ?>

                            </ul>
                        </div>
                        <div id="Charts" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">
                                <!--                                <li><a href="flot-charts.html">Attendance Report</a>-->
                                <!--                                </li>-->
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/report_control/leave_report_controller/leaveReportView">Leave
                                        History Report</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/report_control/work_report_controller/workReportView">Work
                                        Assign Report</a>
                                </li>
                            </ul>
                        </div>
                        <div id="Tables" class="tab-pane notika-tab-menu-bg animated flipInX">
                            <ul class="notika-main-menu-dropdown">

                                <?php if ($_SESSION['user_role'] == 1) { ?>

                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/register_controller/RegisterEmployeeView">
                                            Add Employee</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/user_mgt_control/user_management_controller/userManagementView">
                                            Manage Employee</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url(); ?>index.php/create_login_controller/createLoginView">
                                            Create Login</a>
                                    </li>

                                <?php } else { ?>
                                    <li>
                                        <div class="notification-demo mg-t-20">
                                            <a href="" class="btn" data-type="danger">Add Employee</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="notification-demo mg-t-20">
                                            <a href="" class="btn" data-type="danger">Manage Employee</a>
                                        </div>

                                    </li>
                                    <li>
                                        <div class="notification-demo mg-t-20">
                                            <a href="" class="btn" data-type="danger">Create Login</a>
                                        </div>

                                    </li>

                                <?php } ?>

                            </ul>
                        </div>
                        <?php if ($_SESSION['user_role'] == 1 || $_SESSION['user_role'] == 2) { ?>
                        <div id="Forms" class="tab-pane active notika-tab-menu-bg animated flipInX">

                            <?php }else{ ?>
                            <div id="Forms" class="tab-pane notika-tab-menu-bg animated flipInX">

                                <?php } ?>
                                <ul class="notika-main-menu-dropdown">

                                    <?php if ($_SESSION['user_role'] == 1) { ?>
                                        <li>
                                            <a href="<?php echo base_url(); ?>index.php/leave_mgt_control/all_leave_controller/allLeavesView">All
                                                Leaves</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>index.php/leave_mgt_control/pending_leave_controller/pendingLeavesView">Pending
                                                Leaves</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>index.php/leave_mgt_control/approved_leave_controller/approvedLeavesView">Approved
                                                Leaves</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>index.php/leave_mgt_control/n_approved_leave_controller/notApprovedLeavesView">Not
                                                Approved Leaves</a>
                                        </li>
                                        <li><a href="<?php echo base_url(); ?>index.php/leave_controller/cuLeaveView">Add
                                                /
                                                Manage
                                                Leaves</a>
                                        </li>

                                    <?php } elseif ($_SESSION['user_role'] == 2) { ?>

                                        <li>
                                            <a href="<?php echo base_url(); ?>index.php/leave_mgt_control/all_leave_controller/allLeavesView">All
                                                Leaves</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>index.php/leave_mgt_control/pending_leave_controller/pendingLeavesView">Pending
                                                Leaves</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>index.php/leave_mgt_control/approved_leave_controller/approvedLeavesView">Approved
                                                Leaves</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>index.php/leave_mgt_control/n_approved_leave_controller/notApprovedLeavesView">Not
                                                Approved Leaves</a>
                                        </li>
                                        <?php
                                    } else { ?>
                                        <li>
                                            <div class="notification-demo mg-t-20">
                                                <a href="" class="btn" data-type="danger">All Leaves</a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="notification-demo mg-t-20">
                                                <a href="" class="btn" data-type="danger">Pending Leaves</a>
                                            </div>

                                        </li>
                                        <li>
                                            <div class="notification-demo mg-t-20">
                                                <a href="" class="btn" data-type="danger">Approved Leaves</a>
                                            </div>

                                        </li>
                                        <li>
                                            <div class="notification-demo mg-t-20">
                                                <a href="" class="btn" data-type="danger">Not Approved Leaves</a>
                                            </div>

                                        </li>
                                        <li>
                                            <div class="notification-demo mg-t-20">
                                                <a href="" class="btn" data-type="danger">Add/ Manage Leaves</a>
                                            </div>

                                        </li>


                                    <?php } ?>
                                </ul>
                            </div>
                            <div id="Page" class="tab-pane notika-tab-menu-bg animated flipInX">
                                <ul class="notika-main-menu-dropdown">

                                    <!--                            If Loged as a Admin-->
                                    <?php if ($_SESSION['user_role'] == 1) { ?>
                                        <li>
                                            <a href="<?php echo base_url(); ?>index.php/admin_control/create_office_controller/createOfficeView">Add
                                                Office</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>index.php/admin_control/create_dept_controller/createDepartmentView">Add
                                                Department</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url(); ?>index.php/admin_control/create_desg_controller/createDesigView">Add
                                                Designations</a>
                                        </li>


                                        <!--If User Role User and Leave Officer Logged to the system-->
                                    <?php } else { ?>
                                        <li>
                                            <div class="notification-demo mg-t-20">
                                                <a href="" class="btn" data-type="danger">Add Office</a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="notification-demo mg-t-20">
                                                <a href="" class="btn" data-type="danger">Add Department</a>
                                            </div>

                                        </li>
                                        <li>
                                            <div class="notification-demo mg-t-20">
                                                <a href="" class="btn" data-type="danger">Add Designations</a>
                                            </div>

                                        </li>

                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Menu area End-->

</body>

<!-- Notification Alert JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/notification/bootstrap-growl.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/notification/notify.js"></script>


</html>