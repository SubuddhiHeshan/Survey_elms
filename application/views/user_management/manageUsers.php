<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 5/7/2021
 * Time: 4:31 PM
 */
?>
<!doctype html>


<head>
    <title>Manage Users | Survey - Elms</title>
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">
    <!-- Data Table JS
    ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/notification/notification.css">


</head>

<body style="padding-top: 250px; padding-bottom: 100px; z-index: 5;">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->

<!-- Start Header Top Area -->
<?php $this->load->view('includes/header'); ?>
<!-- End Header Top Area -->


<?php $this->load->view('includes/navigation'); ?>

<!--Manage User View start-->

<!-- Data Table area Start-->
<div class="data-table-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <!--Display flash error and success msgs -->
                <?php if (isset($_SESSION['success'])) { ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true"><i class="notika-icon notika-close"></i></span>
                        </button>
                        <a href="" class="alert-link"><?php echo $_SESSION['success'] ?></a>
                    </div>

                    <?php
                } ?>

                <?php if (isset($_SESSION['error'])) { ?>

                    <div class="alert alert-danger alert-dismissible alert-mg-b-0" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                    aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>
                        <a href="" class="alert-link"><?php echo $_SESSION['error']; ?></a></div>

                    <?php
                } ?>
                <!--End Display flash error and success msgs -->

                <div class="data-table-list">
                    <div class="basic-tb-hd">
                        <h2>Manage Users</h2>
                    </div>
                    <div class="table-responsive">
                        <table id="data-table-basic" class="table table-striped">
                            <thead>
                            <tr>
                                <th>Employee Name</th>
                                <th>Employee No</th>
                                <th>Username</th>
                                <th>Registered Date</th>
                                <th>User Role</th>
                                <th>User Status</th>
                                <th>Lock Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php if ($allDeptUsers != null) {
                                $count = 1; ?>

                                <?php foreach ($allDeptUsers as $udata) { ?>

                                    <tr>
                                        <td>
                                            <span style="color: #0277CA; font-size:16px;"><b><?php echo $udata['fName'] . " " . $udata['lName'] ?></b></span>
                                        </td>
                                        <td><?php echo $udata['empNo']; ?></td>
                                        <td><?php echo $udata['username']; ?></td>
                                        <td><?php echo $udata['createDate']; ?></td>
                                        <td><?php echo $udata['roleType']; ?></td>

                                        <td>
                                            <?php if ($udata['userStatus'] == 1) { ?>
                                                <span style="color: green">Active</span>

                                            <?php }
                                            if ($udata['userStatus'] == 0) { ?>
                                                <span style="color: red">Inactive</span>

                                            <?php } ?>

                                        </td>
                                        <td>
                                            <?php if ($udata['lockStatus'] == 1) { ?>
                                                <span style="color: blue">Unlocked</span>

                                            <?php }
                                            if ($udata['lockStatus'] == 0) { ?>
                                                <span style="color: red">Locked</span>

                                            <?php } ?>
                                        </td>


                                        <td>
                                            <?php if ($udata['userStatus'] == 1) { ?>
                                                <a title="Disable User"><i class="fa fa-user-times fa-2x"
                                                                           onclick="setUserStatus(<?php echo $udata['userStatus'] ?>,<?php echo $udata['empNo']; ?>)"></i></a>

                                            <?php } elseif ($udata['userStatus'] == 0) { ?>
                                                <a title="Enable User"><i class="fa fa-user-plus fa-2x"
                                                                          onclick="setUserStatus(<?php echo $udata['userStatus'] ?>,<?php echo $udata['empNo']; ?>)"></i></a>
                                            <?php } ?>
                                            &nbsp;&nbsp;
                                            <?php if ($udata['lockStatus'] == 1) { ?>
                                                <a title="Lock User"><i class="fa fa-lock fa-2x"
                                                                        onclick="setlockStatus(<?php echo $udata['lockStatus']; ?>,'<?php echo $udata['username']; ?>')"></i></a>

                                            <?php } elseif ($udata['lockStatus'] == 0) { ?>
                                                <a title="Unlock User"><i class="fa fa-unlock fa-2x"
                                                                          onclick="setlockStatus(<?php echo $udata['lockStatus']; ?>,'<?php echo $udata['username']; ?>')"></i></a>
                                            <?php } ?>
                                        </td>


                                        <?php $count++; ?>
                                    </tr>
                                <?php }
                            } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Data Table area End-->

<!--Manage User view end-->

<!-- Start Footer area-->
<?php $this->load->view('includes/footer'); ?>
<!-- End Footer area-->


</body>

<script type="text/javascript">

    function setUserStatus(num1, num2) {
        var ustatus = num1;
        var empno = num2;
        if (ustatus == 1) {
            var text = "Do you want to Disable this user";
        } else {
            var text = "Do you want to Enable this User";
        }
        swal({
            title: "Are you sure?",
            text: text,
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, Confirm",
            cancelButtonText: "No, Decline",
        }).then(function (isConfirm) {
            if (isConfirm) {
                $.ajax({
                    type: 'POST',
                    data: {status: ustatus, employee: empno},
                    url: '<?php echo base_url();?>index.php/user_mgt_control/user_management_controller/updateUserStatus',
                    success: function (result) {
                        if (result == 1) {
                            swal({
                                text: "Successfully Updated",
                                type: "success",

                            });
                        } else {
                            swal({
                                text: "Action already Taken",
                                type: "error",

                            });
                        }
                    }
                });

            } else {
                swal("Cancelled", "Not Accepted", "error");
            }
        });
    };

    function setlockStatus(num1,num2) {
        var lockStatus = num1;
        var uname = num2;
        if (lockStatus == 1) {
            var text = "Do you want to Lock this user";
        } else {
            var text = "Do you want to Unlock this User";
        }
        swal({
            title: "Are you sure?",
            text: text,
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, Confirm",
            cancelButtonText: "No, Decline",
        }).then(function (isConfirm) {
            if (isConfirm) {
                $.ajax({
                    type: 'POST',
                    data: {status: lockStatus, username: uname},
                    url: '<?php echo base_url();?>index.php/user_mgt_control/user_management_controller/updateLockStatus',
                    success: function (result) {
                        if (result == 1) {
                            swal({
                                text: "Successfully Updated",
                                type: "success",

                            });
                        } else {
                            swal({
                                text: "Action already Taken",
                                type: "error",

                            });
                        }
                    }
                });

            } else {
                swal("Cancelled", "Not Accepted", "error");
            }
        });
    };

</script>


<!-- Notification Alert JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/notification/bootstrap-growl.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/notification/notify.js"></script>


<!-- Data Table JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/data-table/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/data-table/data-table-act.js"></script>


</html>

