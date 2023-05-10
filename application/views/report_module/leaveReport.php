<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 4/28/2021
 * Time: 7:13 PM
 */ ?>

<!doctype html>


<head>
    <title>Leave Report | Survey - Elms</title>
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
<!-- Invoice Print Area Start -->
<!--<div class="invoice-print">-->
<!--    <a href="#" class="btn" data-ma-action="print"><i class="notika-icon notika-print"></i></a>-->
<!--</div>-->
<!-- Invoice Print Area End -->
<!-- Start Header Top Area -->
<?php $this->load->view('includes/header'); ?>
<!-- End Header Top Area -->


<?php $this->load->view('includes/navigation'); ?>

<!--Leave Report View start-->

<div class="form-element-area">
    <div class="container">
        <div class="row">
            <form name="createEmployee" method="post"
                  action="<?php echo base_url(); ?>index.php/report_control/leave_report_controller/leaveReportView?gen=1">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-element-list">
                        <div class="cmp-tb-hd">
                            <h2>Leave History Report</h2>
                        </div>
                        <div class="row">

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-element-list mg-t-30">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <div class="nk-int-mk sl-dp-mn">
                                                <h2>Select Office</h2>
                                            </div>
                                            <div class="bootstrap-select fm-cmp-mg">
                                                <select class="selectpicker" name="office" data-live-search="true"
                                                        required>

<!--                                                    --><?php //if ($_SESSION['user_role'] == 1) { ?>
<!--                                                        <option value="%"><b>All</b></option>-->
<!---->
<!--                                                    --><?php //} ?>

                                                    <?php foreach ($Offices as $ofz) { ?>

                                                        <!--If loged as a user or leave Officer-->
                                                        <?php if ($_SESSION['user_role'] == 1 || $_SESSION['user_role'] == 2 || $_SESSION['user_role'] == 3) {
                                                            if ($ofz['ofzId'] == $_SESSION['ofz']) { ?>
                                                                <option value="<?php echo $ofz['ofzId']; ?>">
                                                                    <b><?php echo $ofz['ofzName']; ?></b></option>

                                                            <?php }
//                                                            If loged as a Super
                                                        } else { ?>
                                                            <option value="<?php echo $ofz['ofzId']; ?>">
                                                                <b><?php echo $ofz['ofzName']; ?></b></option>

                                                        <?php } ?>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <div class="nk-int-mk sl-dp-mn">
                                                <h2>Select Branch</h2>
                                            </div>
                                            <div class="bootstrap-select fm-cmp-mg">
                                                <select class="selectpicker" name="dept" data-live-search="true"
                                                        required>
<!--                                                    --><?php //if ($_SESSION['user_role'] == 1) { ?>
<!--                                                        <option value="%"><b>All</b></option>-->
<!---->
<!--                                                    --><?php //} ?>

                                                    <?php foreach ($Departments as $depts) { ?>
                                                        <?php if ($_SESSION['user_role'] == 1 || $_SESSION['user_role'] == 2 || $_SESSION['user_role'] == 3) {
                                                            if ($depts['deptId'] == $_SESSION['dept']) {
                                                                ?>
                                                                <option value="<?php echo $depts['deptId']; ?>">
                                                                    <b><?php echo $depts['deptName']; ?></b></option>

                                                            <?php }
                                                        } else { ?>
                                                            <option value="<?php echo $depts['deptId']; ?>">
                                                                <b><?php echo $depts['deptName']; ?></b></option>

                                                        <?php } ?>

                                                    <?php } ?>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <div class="nk-int-mk sl-dp-mn">
                                                <h2>Select Employee</h2>
                                            </div>
                                            <div class="bootstrap-select fm-cmp-mg">
                                                <select class="selectpicker" name="emp" data-live-search="true"
                                                        required>
                                                    <?php if ($_SESSION['user_role'] == 1 || $_SESSION['user_role'] == 2) { ?>
                                                        <option value="%"><b>All</b></option>

                                                    <?php } ?>
                                                    <?php foreach ($Users as $usr) { ?>
                                                        <?php if ($_SESSION['user_role'] == 3) {
                                                            if ($usr['empNo'] == $_SESSION['emp']) {
                                                                ?>
                                                                <option value="<?php echo $usr['empNo']; ?>">
                                                                    <b><?php echo $usr['empNo'] . " - " . $usr['fName'] . " " . $usr['lName'] ?></b>
                                                                </option>

                                                            <?php }
                                                        } else { ?>
                                                            <option value="<?php echo $usr['empNo']; ?>">
                                                                <b><?php echo $usr['empNo'] . " - " . $usr['fName'] . " " . $usr['lName'] ?></b>
                                                            </option>

                                                        <?php } ?>

                                                    <?php } ?>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <div class="nk-int-mk sl-dp-mn">
                                                <h2>Leave Type</h2>
                                            </div>
                                            <div class="bootstrap-select fm-cmp-mg">
                                                <select class="selectpicker" name="type" data-live-search="true"
                                                        required>
                                                    <option value="%"><b>All</b></option>
                                                    <?php foreach ($Leaves as $lvs) { ?>
                                                        <option value="<?php echo $lvs['levId']; ?>">
                                                            <b><?php echo $lvs['levName']; ?></b></option>

                                                    <?php } ?>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-top: 30px;">
                                            <div class="nk-int-mk sl-dp-mn">
                                                <h2>Leave Status</h2>
                                            </div>
                                            <div class="bootstrap-select fm-cmp-mg">
                                                <select class="selectpicker" name="status" data-live-search="true"
                                                        required>
                                                    <option value="%"><b>All</b></option>
                                                    <option value="0"><b>Waitting for Approval</b></option>
                                                    <option value="1"><b>Approved</b></option>
                                                    <option value="2"><b>Not Approved</b></option>

                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <div class="nk-int-mk sl-dp-mn mg-t-30">
                                                <h2>From Date</h2>
                                            </div>
                                            <div class="bootstrap-select">
                                                <input type="date" name="fdate" value=""
                                                       class="form-control"
                                                       placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <div class="nk-int-mk sl-dp-mn mg-t-30">
                                                <h2>To Date</h2>
                                            </div>
                                            <div class="bootstrap-select">
                                                <input type="date" name="tDate" value=""
                                                       class="form-control"
                                                       placeholder="">
                                            </div>
                                        </div>


                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <div class="dialog">
                                                <button type="submit" style="margin-top: 50px; "
                                                        class="btn btn-success">Find
                                                </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<!--                                                <button type="" style="margin-top: 50px;"-->
<!--                                                        class="btn btn-danger">Export Pdf-->
<!--                                                </button>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--Leave Report view end-->
    <div class="normal-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="normal-table-list mg-t-30">
                        <div class="bsc-tbl-st">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Employee Name</th>
                                    <th>Employee ID</th>
                                    <th>Leave Type</th>
                                    <th>From Date</th>
                                    <th>To Date</th>
                                    <th>Applied Leave Quantity</th>
                                    <th>Leave Status</th>
                                    <th>Remarks</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $count = 1; ?>
                                <?php if (isset($genData) && $genData != null) { ?>

                                    <?php foreach ($genData as $rptData) { ?>
                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo $rptData['fName'] . ' ' . $rptData['lName'] ?></td>
                                            <td><?php echo $rptData['empNo']; ?></td>
                                            <td><?php echo $rptData['levName']; ?></td>
                                            <td><?php echo $rptData['fromDate']; ?></td>
                                            <td><?php echo $rptData['toDate']; ?></td>
                                            <td><?php echo $rptData['applyQty']; ?></td>
                                            <td>
                                                <?php if ($rptData['status'] == 1) { ?>
                                                    <span style="color: green">Approved</span>

                                                <?php }
                                                if ($rptData['status'] == 2) { ?>
                                                    <span style="color: red">Not Approved</span>

                                                <?php }
                                                if ($rptData['status'] == 0) { ?>
                                                    <span style="color: blue">Waitting for Approval</span>
                                                <?php } ?>

                                            </td>
                                            <td><?php echo $rptData['disc']; ?></td>
                                        </tr>
                                        <?php $count++;
                                    }

                                } else { ?>
                                    <tr>
                                        <td colspan="9" style="text-align: center">
                                            <span>No Data to Show</span>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--leave Report view end-->

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

