<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 5/6/2021
 * Time: 11:12 PM
 */ ?>
<!doctype html>


<head>
    <title>Work History Report | Survey - Elms</title>
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

<!--Work Assign Filter  start-->
<div class="form-element-area">
    <div class="container">
        <div class="row">
            <form name="createEmployee" method="post"
                  action="<?php echo base_url(); ?>index.php/report_control/work_report_controller/workReportView?gen=1">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-element-list">
                        <div class="cmp-tb-hd">
                            <h2>Work History Report</h2>
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

                                                        <!--If loged as a user or leave Officer or admin-->
                                                        <?php if ($_SESSION['user_role'] == 2 || $_SESSION['user_role'] == 3 || $_SESSION['user_role'] == 1) {
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
                                                <h2>Assign By</h2>
                                            </div>
                                            <div class="bootstrap-select fm-cmp-mg">
                                                <select class="selectpicker" name="aBy" data-live-search="true"
                                                        required>
                                                    <?php if ($_SESSION['user_role'] == 1 || $_SESSION['user_role'] == 2) { ?>
                                                        <option value="%"><b>All</b></option>

                                                    <?php } ?>
                                                    <?php foreach ($AssignBy

                                                                   as $aByu) { ?>
                                                        <option value="<?php echo $aByu['username']; ?>">
                                                            <b><?php echo $aByu['empNo'] . " - " . $aByu['fName'] . " " . $aByu['lName'] ?></b>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <div class="nk-int-mk sl-dp-mn">
                                                <h2>Assign To</h2>
                                            </div>
                                            <div class="bootstrap-select fm-cmp-mg">
                                                <select class="selectpicker" name="aTo" data-live-search="true"
                                                        required>
                                                    <?php if ($_SESSION['user_role'] == 1 || $_SESSION['user_role'] == 2) { ?>
                                                        <option value="%"><b>All</b></option>

                                                    <?php } ?>
                                                    <?php foreach ($AssignTo as $aTou) { ?>
                                                        <?php if ($_SESSION['user_role'] == 3) {
                                                            if ($aTou['empNo'] == $_SESSION['emp']) {
                                                                ?>
                                                                <option value="<?php echo $aTou['empNo']; ?>">
                                                                    <b><?php echo $aTou['empNo'] . " - " . $aTou['fName'] . " " . $aTou['lName'] ?></b>
                                                                </option>

                                                            <?php }
                                                        } else { ?>
                                                            <option value="<?php echo $aTou['empNo']; ?>">
                                                                <b><?php echo $aTou['empNo'] . " - " . $aTou['fName'] . " " . $aTou['lName'] ?></b>
                                                            </option>

                                                        <?php } ?>

                                                    <?php } ?>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-top: 30px;">
                                            <div class="nk-int-mk sl-dp-mn">
                                                <h2>Task Status</h2>
                                            </div>
                                            <div class="bootstrap-select fm-cmp-mg">
                                                <select class="selectpicker" name="Tstatus" data-live-search="true"
                                                        required>
                                                    <option value="%"><b>All</b></option>
                                                    <option value="1"><b>Accepted</b></option>
                                                    <option value="0"><b>Not Accepted</b></option>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-top: 30px;">
                                            <div class="nk-int-mk sl-dp-mn">
                                                <h2>Priority Level</h2>
                                            </div>
                                            <div class="bootstrap-select fm-cmp-mg">
                                                <select class="selectpicker" name="Priority" data-live-search="true"
                                                        required>
                                                    <option value="%"><b>All</b></option>
                                                    <option value="1"><b>High</b></option>
                                                    <option value="2"><b>Medium</b></option>
                                                    <option value="3"><b>Low</b></option>

                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-top: 30px;">
                                            <div class="nk-int-mk sl-dp-mn">
                                                <h2>Task Progress</h2>
                                            </div>
                                            <div class="bootstrap-select fm-cmp-mg">
                                                <select class="selectpicker" name="prog" data-live-search="true"
                                                        required>
                                                    <option value="%"><b>All</b></option>
                                                    <option value="1"><b>0% Completed</b></option>
                                                    <option value="2"><b>25% Completed</b></option>
                                                    <option value="3"><b>50% Completed</b></option>
                                                    <option value="4"><b>75% Completed</b></option>
                                                    <option value="5"><b>100% Completed</b></option>

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


                                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                            <div class="dialog">
                                                <button type="submit" style="margin-top: 50px;"
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
    <!--Work Assign Filter view end-->
    <!--    Report Data Table Start-->
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
                                    <th>Task Name</th>
                                    <th>Assign By</th>
                                    <th>Assign To</th>
                                    <th>Task Status</th>
                                    <th>Priority</th>
                                    <th>Progress</th>
                                    <th>Task Assign Date</th>
                                    <th>Task Done Date</th>
                                    <th>Remarks</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if (isset($genData) && $genData != null) { ?>
                                    <?php $count = 1; ?>
                                    <?php foreach ($genData as $rptData) { ?>
                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo $rptData['workName']; ?></td>
                                            <td><?php echo $rptData['Bfname'] . ' ' . $rptData['Blname'] ?></td>
                                            <td><?php echo $rptData['Tfname'] . ' ' . $rptData['Tlname'] ?></td>
                                            <td>
                                                <?php if ($rptData['stage'] == 0) { ?>
                                                    <span>Not Accepted</span>

                                                <?php }
                                                if ($rptData['stage'] == 1) { ?>
                                                    <span>Accepted</span>

                                                <?php } ?>

                                            </td>
                                            <td>
                                                <?php if ($rptData['priorityLevel'] == 1) { ?>
                                                    <span>High</span>

                                                <?php }
                                                if ($rptData['priorityLevel'] == 2) { ?>
                                                    <span>Medium</span>

                                                <?php }
                                                if ($rptData['priorityLevel'] == 3) { ?>
                                                    <span>Low</span>

                                                <?php } ?>
                                            </td>

                                            <td>
                                                <?php if ($rptData['worStage'] == 0) { ?>
                                                    <span>N/A</span>

                                                <?php }
                                                if ($rptData['worStage'] == 1) { ?>
                                                    <span>0% Completed</span>

                                                <?php }
                                                if ($rptData['worStage'] == 2) { ?>
                                                    <span>25% Completed</span>

                                                <?php }
                                                if ($rptData['worStage'] == 3) { ?>
                                                    <span>50% Completed</span>

                                                <?php }
                                                if ($rptData['worStage'] == 4) { ?>
                                                    <span>75% Completed</span>
                                                <?php }
                                                if ($rptData['worStage'] == 5) { ?>
                                                    <span>100% Completed</span>
                                                    <?php
                                                } ?>
                                            </td>


                                            <td><?php echo $rptData['assignDate']; ?></td>
                                            <td>
                                                <?php if ($rptData['doneDate'] == null) { ?>
                                                    <span>N/A</span>

                                                <?php } else { ?>
                                                    <?php echo $rptData['doneDate']; ?>

                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?php if ($rptData['workRemark'] == null) { ?>
                                                    <span>N/A</span>

                                                <?php } else { ?>
                                                    <?php echo $rptData['workRemark']; ?>

                                                <?php } ?>
                                            </td>
                                        </tr>
                                        <?php
                                        $count++;

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
    <!--    Report Data Table End-->

    <!-- Start Footer area-->
    <?php $this->load->view('includes/footer'); ?>
    <!-- End Footer area-->


</body>


<!-- Notification Alert JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/notification/bootstrap-growl.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/notification/notify.js"></script>

</html>

