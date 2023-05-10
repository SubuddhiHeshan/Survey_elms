<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 4/24/2021
 * Time: 3:26 PM
 */ ?>

<!doctype html>


<head>
    <title>Print Leave | Survey - Elms</title>
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

<!--Leave History View start-->

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
                        <h2>Print Leave</h2>
                    </div>
                    <div class="table-responsive">
                        <table id="data-table-basic" class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Leave Type</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Applied Quantity</th>
                                <th>Approved Quantity</th>
                                <th>Approved Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php if ($prntDtl != null) { ?>

                                <?php $count = 1; ?>
                                <?php foreach ($prntDtl as $print) { ?>

                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td><?php echo $print['levName']; ?></td>
                                        <td><?php echo $print['fromDate']; ?></td>
                                        <td><?php echo $print['toDate']; ?></td>

                                        <?php if ($print['applyQty'] == 0.50) { ?>

                                            <td>0.5 (Half Day)</td>

                                        <?php } else { ?>

                                            <td><?php echo $print['applyQty']; ?></td>

                                        <?php } ?>

                                        <?php if ($print['aprdQty'] == 0.50) { ?>

                                            <td>0.5 (Half Day)</td>

                                        <?php } else { ?>

                                            <td><?php echo $print['aprdQty']; ?></td>

                                        <?php } ?>

                                        <td><?php echo $print['adminRemarkDate']; ?></td>


                                        <td>
                                            <a href="<?php echo base_url(); ?>index.php/print_lev_dtls_controller/printLevDtls?leaveId=<?php echo $print['id']; ?>"
                                               target="_blank">
                                                <button class="btn btn-primary notika-btn-primary">Print Leave</button>
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

<!--leave history view end-->

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

