<?php
error_reporting(0);
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 1/31/2021
 * Time: 11:24 PM
 */
?>

<!doctype html>


<head>
    <title>Leave History | Survey - Elms</title>
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

<!--Leave History View start-->




<!-- Data Table area Start-->
<div class="data-table-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="data-table-list">
                    <div class="basic-tb-hd">
                        <h2>Daily Attendance Report</h2>
                    </div>
                    <div class="table-responsive">
<!--                        /////////////////////-->

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-element-list mg-t-30">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" style="margin-top: 30px;">
                                            <div class="nk-int-mk sl-dp-mn">
                                                <h2>Enter Employee No</h2>
                                            </div>
                                            <div class="bootstrap-select fm-cmp-mg">
                                                <input type="number" name="email" value=""
                                                       class="form-control"
                                                       placeholder="Emp No">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <div class="nk-int-mk sl-dp-mn mg-t-30">
                                                <h2>From Date</h2>
                                            </div>
                                            <div class="bootstrap-select">
                                                <input type="date" name="email" value=""
                                                       class="form-control"
                                                       placeholder="Email Address">
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <div class="nk-int-mk sl-dp-mn mg-t-30">
                                                <h2>To Date</h2>
                                            </div>
                                            <div class="bootstrap-select">
                                                <input type="date" name="email" value=""
                                                       class="form-control"
                                                       placeholder="Email Address">
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                            <button type="submit" style="margin-top: 50px;" class="btn btn-success notika-btn-success text-right">Find
                                            </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <button type="submit" style="margin-top: 50px;" class="btn btn-danger notika-btn-success text-right">Print
                                            </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <button type="submit" style="margin-top: 50px;" class="btn btn-success notika-btn-success text-right">Export
                                            </button>

                                        </div>

                                        <!--                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">-->
<!--                                            <div class="nk-int-mk sl-dp-mn sm-res-mg-t-10">-->
<!--                                                <h2>Select Task</h2>-->
<!--                                            </div>-->
<!--                                            <div class="bootstrap-select fm-cmp-mg">-->
<!--                                                <select class="selectpicker">-->
<!--                                                    <option disabled="disabled">Casual</option>-->
<!--                                                    <option>Ammendments</option>-->
<!--                                                    <option>Kamines</option>-->
<!--                                                    <option disabled="disabled">Malias</option>-->
<!--                                                    <option>Cheriska</option>-->
<!--                                                </select>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
                                    <div class="row">
<!--                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">-->
<!--                                            <div class="nk-int-mk sl-dp-mn mg-t-30">-->
<!--                                                <h2>From Date</h2>-->
<!--                                            </div>-->
<!--                                            <div class="bootstrap-select">-->
<!--                                                <input type="date" name="email" value=""-->
<!--                                                       class="form-control"-->
<!--                                                       placeholder="Email Address">-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">-->
<!--                                            <div class="nk-int-mk sl-dp-mn mg-t-30">-->
<!--                                                <h2>To Date</h2>-->
<!--                                            </div>-->
<!--                                            <div class="bootstrap-select">-->
<!--                                                <input type="date" name="email" value=""-->
<!--                                                       class="form-control"-->
<!--                                                       placeholder="Email Address">-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">-->
<!--                                            <div class="nk-int-mk sl-dp-mn mg-t-30">-->
<!--                                                <h2>Task Status</h2>-->
<!--                                            </div>-->
<!--                                            <div class="bootstrap-select">-->
<!--                                                <select class="selectpicker">-->
<!--                                                    <option disabled="disabled">On Going</option>-->
<!--                                                    <option>On Going</option>-->
<!--                                                    <option>Kamines</option>-->
<!--                                                    <option disabled="disabled">Malias</option>-->
<!--                                                    <option>Cheriska</option>-->
<!--                                                </select>-->
<!--                                            </div>-->
<!---->
<!--                                        </div>-->

<!--                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">-->
<!--                                            <button type="submit" style="margin-top: 50px;" class="btn btn-success notika-btn-success text-right">Find-->
<!--                                            </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
<!--                                            <button type="submit" style="margin-top: 50px;" class="btn btn-danger notika-btn-success text-right">Print-->
<!--                                            </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
<!--                                            <button type="submit" style="margin-top: 50px;" class="btn btn-success notika-btn-success text-right">Export-->
<!--                                            </button>-->
<!---->
<!--                                        </div>-->


                                    </div>


                                </div>
                            </div>
                        </div>

<!--                        /////////////////////////////-->
                        <table id="data-table-basic" class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Employee Name</th>
                                <th>Employee No</th>
                                <th>Department</th>
                                <th>Office</th>
                                <th>IN Time</th>
                                <th>Out Time </th>
                                <th>Date</th>

                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Hiruni Chathurika</td>
                                    <td>12225</td>
                                    <td>Finance</td>
                                    <td>SGO - Head Office</td>
                                    <td>08:20:42</td>
                                    <td>16:32:43</td>
                                    <td>2021/01/05</td>




                                </tr>

                            </tbody>
<!--                            <tfoot>-->
<!--                            <tr>-->
<!--                                <th>#</th>-->
<!--                                <th>Leave Type</th>-->
<!--                                <th>From</th>-->
<!--                                <th>To</th>-->
<!--                                <th>Applied Quantity</th>-->
<!--                                <th>Description</th>-->
<!--                                <th>Posting Date</th>-->
<!--                                <th>Admin Remarks</th>-->
<!--                                <th>Status</th>-->
<!--                            </tr>-->
<!--                            </tfoot>-->
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

