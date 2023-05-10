<?php
//error_reporting(0);
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 1/29/2021
 * Time: 12:15 AM
 */ ?>

<!doctype html>


<head>
    <title>Leave History | Survey - Elms</title>
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

<!--Leave History View start-->

<!-- Data Table area Start-->
<div class="data-table-area">
    <div class="container">
        <div class="row">

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

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="data-table-list">
                    <div class="basic-tb-hd">
                        <h2>Leave History</h2>
                    </div>
                    <div class="table-responsive">
                        <table id="data-table-basic" class="table table-striped">
                            <thead>
                            <tr>
                                <th>Leave Type</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Applied Quantity</th>
                                <th>Description</th>
                                <th>Posting Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php if ($history != null) { ?>
                                <?php foreach ($history as $lh) { ?>

                                    <tr>
                                        <td><?php echo $lh['levName']; ?></td>
                                        <td><?php echo $lh['fromDate']; ?></td>
                                        <td><?php echo $lh['toDate']; ?></td>

                                        <?php if ($lh['applyQty'] == 0.50) { ?>

                                            <td>0.5 (Half Day)</td>

                                        <?php } else { ?>

                                            <td><?php echo $lh['applyQty']; ?></td>

                                        <?php } ?>

                                        <td><?php echo $lh['disc']; ?></td>
                                        <td><?php echo $lh['applyDate']; ?></td>

                                        <td>
                                            <?php if ($lh['status'] == 1) { ?>
                                                <span style="color: green">Approved</span>

                                            <?php }
                                            if ($lh['status'] == 2) { ?>
                                                <span style="color: red">Not Approved</span>

                                            <?php }
                                            if ($lh['status'] == 0) { ?>
                                                <span style="color: blue">Waitting for Approvl</span>
                                            <?php } ?>

                                        </td>

                                        <?php if ($lh['status'] != 1 && $lh['status'] != 2) { ?>

                                            <td>
                                                <a href="<?php echo base_url(); ?>index.php/leave_controller/editLeave?leaveid=<?php echo $lh['id']; ?>"
                                                   title="Edit Leave"><i class="fa fa-edit fa-2x"></i></a> &nbsp;
                                                <a href="<?php echo base_url(); ?>index.php/leave_controller/deleteLeave?leaveid=<?php echo $lh['id']; ?>"
                                                   title="Delete Leave"><i class="fa fa-trash fa-2x"></i></a>
                                            </td>

                                        <?php } else { ?>
                                            <td>
                                                <i class="fa fa-edit fa-2x" title="Edit Leave"></i> &nbsp;
                                                <i class="fa fa-trash fa-2x" title="Edit Leave"></i>

                                            </td>

                                        <?php } ?>
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

<!--leave history view end-->

<!-- Start Footer area-->
<?php $this->load->view('includes/footer'); ?>
<!-- End Footer area-->


</body>


<!-- Notification Alert JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/notification/bootstrap-growl.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/notification/notify.js"></script>


<!-- Data Table JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/data-table/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/data-table/data-table-act.js"></script>


</html>
