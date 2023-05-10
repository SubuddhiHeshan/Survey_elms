<?php error_reporting(0);
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 4/17/2021
 * Time: 9:05 PM
 */ ?>

<!doctype html>


<head>
    <title>All Leave | Survey - Elms</title>
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">
    <!-- Data Table JS
    ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.dataTables.min.css">


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


<!--All Leave View start-->

<!-- Data Table area Start-->
<div class="data-table-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="data-table-list">
                    <div class="basic-tb-hd">
                        <h4 style="text-transform: uppercase; color: #666666; ">All Leave Applications</h4>
                    </div>

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

                    <div class="table-responsive">
                        <table id="data-table-basic" class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Employee Name</th>
                                <th>Leave Type</th>
                                <th>Posting Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if ($allLvs != null) { ?>

                                <?php $count = 1; ?>

                                <?php foreach ($allLvs as $all) { ?>

                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td><span style="color: #0277CA; font-size:16px;"><b><?php echo $all['fName'] . " " . $all['lName'] ?> </br>
                                                    (<?php echo $all['empNo'] ?>)</b></span></td>
                                        <td><?php echo $all['levName']; ?></td>
                                        <td><?php echo $all['applyDate']; ?></td>

                                        <td>
                                            <?php if ($all['status'] == 1) { ?>
                                                <span style="color: green">Approved</span>

                                            <?php }
                                            if ($all['status'] == 2) { ?>
                                                <span style="color: red">Not Approved</span>

                                            <?php }
                                            if ($all['status'] == 0) { ?>
                                                <span style="color: blue">Waitting for Approval</span>
                                            <?php } ?>

                                        </td>

                                        <td>
                                            <a href="<?php echo base_url(); ?>index.php/leave_mgt_control/leave_dtl_controller/detailsView?leaveid=<?php echo $all['id']; ?>">
                                                <button class="btn btn-primary notika-btn-primary">View Details</button>
                                            </a>
                                        </td>

                                    </tr>
                                    <?php $count++;
                                }
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

<!--All leave view end-->

<!-- Start Footer area-->
<?php $this->load->view('includes/footer'); ?>
<!-- End Footer area-->


</body>

<!-- Data Table JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/data-table/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/data-table/data-table-act.js"></script>

<!-- Notification Alert JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/notification/bootstrap-growl.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/notification/notify.js"></script>

</html>

