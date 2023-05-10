<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 5/2/2021
 * Time: 11:50 AM
 */ ?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <!-- favicon
       ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">
    <title>Dashboard | Survey_Elms </title>
</head>

<body style="padding-top: 250px; padding-bottom: 100px; z-index: 5;">
<!--<start Header Top Area>-->
<?php $this->load->view('includes/header'); ?>
<!-- End Header Top Area -->

<!--Strat Main Menu Area-->
<?php $this->load->view('includes/navigation'); ?>
<!--End Main Menu Area-->

<!-- Start Status area -->
<div class="notika-status-area">
    <div class="container">

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

        <div class="row">


            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">

                    <div class="website-traffic-ctn">
                        <h2><span class="counter"><?php echo $brApdCount->brApdCount; ?></h2>
                        <p>Total Leaves Approved In your Branch</p>
                    </div>
                    <div class="sparkline-bar-stats1">9,4,8,6,5</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2><span class="counter"><?php echo $brNApdCount->brNApdCount; ?></h2>
                        <p>Total Leaves Not Approved In your Branch</p>
                    </div>
                    <div class="sparkline-bar-stats2">9,4,8,6,5</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2><span class="counter"><?php echo $brPendingCount->brPendCount; ?></h2>
                        <p>Total Leaves Pending for Approval In your Branch</p>
                    </div>
                    <div class="sparkline-bar-stats3">9,8</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                    <div class="website-traffic-ctn">
                        <h2><span class="counter"><?php echo $TotRegCount->regEmpCount; ?></span></h2>
                        <p>Total Registered Employees In Your Branch</p>
                    </div>
                    <div class="sparkline-bar-stats4">2,4,8,4,5,7,4,7</div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Status area-->
<!-- Start Leave Applications area-->
<div class="sale-statistic-area">
    <div class="container">
        <div class="row">
            <div class="normal-table-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12">
                            <div class="normal-table-list mg-t-30">
                                <div class="basic-tb-hd">
                                    <h4 style="text-transform: uppercase; color: #666666; ">Latest Branch Leave
                                        Summary</h4>
                                </div>

                                <div class="bsc-tbl-st">
                                    <table class="table table-striped">
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

                                        <?php if ($BrLeaveSummry != null) { ?>

                                            <?php $count = 1; ?>

                                            <?php foreach ($BrLeaveSummry as $all) { ?>

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
                                                            <button class="btn btn-primary notika-btn-primary">View
                                                                Details
                                                            </button>
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
                        <!--End Leave Details Applications-->

                        <!--Start To Do List Functions-->
                        <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
                            <div class="add-todo-list notika-shadow mg-t-30">
                                <div class="realtime-ctn">
                                    <div class="realtime-title">
                                        <h2>Add Todo</h2>
                                    </div>
                                </div>
                                <div class="card-box">
                                    <div class="todoapp">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-sm-6 col-xs-12">
                                                <h4 id="todo-message"><span id="todo-remaining"></span> of <span
                                                            id="todo-total"></span> remaining</h4>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="notika-todo-btn">
                                                    <a href="#" class="pull-right btn btn-primary btn-sm"
                                                       id="btn-archive">Archive</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="notika-todo-scrollbar">
                                            <ul class="list-group no-margn todo-list" id="todo-list"></ul>
                                        </div>
                                        <div id="todo-form">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-sm-12 col-xs-12 todo-inputbar">
                                                    <div class="form-group todo-flex">
                                                        <div class="nk-int-st">
                                                            <input type="text" id="todo-input-text"
                                                                   name="todo-input-text"
                                                                   class="form-control" placeholder="Add new todo">
                                                        </div>
                                                        <div class="todo-send">
                                                            <button class="btn-primary btn-md btn-block btn notika-add-todo"
                                                                    type="button" id="todo-btn-submit">Add
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End To Do List Function-->
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End Leave Applications area-->

<!-- Start Footer area-->
<?php $this->load->view('includes/footer'); ?>
<!--<End Footer Area >-->

</body>

<!-- Notification Alert JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/notification/bootstrap-growl.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/notification/notify.js"></script>

</html>

