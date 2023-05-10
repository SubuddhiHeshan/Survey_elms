<?php
error_reporting(0);
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 4/17/2021
 * Time: 11:10 AM
 */ ?>


<!doctype html>


<head>
    <title>Edit Leave | Survey - Elms</title>
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

<div class="form-element-area">
    <div class="container">
        <div class="row">
            <form name="editLeaveform" id="editLeaveform" method="post"
                  action="<?php echo base_url(); ?>index.php/leave_controller/updateLeave?leaveid=<?php echo $EditId; ?>">

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
                    <div class="form-element-list mg-t-30">
                        <div class="cmp-tb-hd">
                            <h2>Edit Leave</h2>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="nk-int-mk">
                                    <h2>Select Leave Type</h2>
                                </div>
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-star"></i>
                                    </div>

                                    <div class="bootstrap-select fm-cmp-mg form-control">
                                        <select name="leavetype" class="selectpicker form-control" required>
                                            <option value="<?php echo $LvData->levId; ?>"><?php echo $LvData->levName; ?></option>

                                            <?php foreach ($Leaves as $lvs) { ?>
                                                <option value="<?php echo $lvs['levId']; ?>"><?php echo $lvs['levName']; ?></option>
                                            <?php } ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="nk-int-mk">
                                    <h2>From Date</h2>
                                </div>
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-calendar"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input name="fromdate" type="text" id="fromdate" onkeyup="dateCheck();"
                                               class="form-control" data-mask="99/99/9999"
                                               value="<?php echo $LvData->fromDate; ?>"
                                               placeholder="dd/mm/yyyy" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="nk-int-mk">
                                    <h2>To Date</h2>
                                </div>
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-calendar"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input name="todate" type="text" id="todate" onkeyup="dateCheck();"
                                               class="form-control" data-mask="99/99/9999"
                                               value="<?php echo $LvData->toDate; ?>"
                                               placeholder="dd/mm/yyyy" required>
                                        <span id="message"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="nk-int-mk">
                                    <h2>Requested Quantity</h2>

                                </div>
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-star"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <?php if ($LvData->applyQty == 0.50) { ?>
                                            <input name="reqQty" id="reqQty" type="number" step="0.01"
                                                   value="0.50 (Half Day)" onkeyup="quantityValidate();"
                                                   class="form-control" placeholder="Quantity" required>

                                        <?php } else { ?>
                                            <input name="reqQty" id="reqQty" type="number" step="0.01"
                                                   value="<?php echo $LvData->applyQty; ?>"
                                                   onkeyup="quantityValidate();"
                                                   class="form-control" placeholder="Quantity" required>

                                        <?php } ?>
                                    </div>
                                    <span style="margin-left: 0px;" id="msg"></span>

                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="nk-int-mk">
                                    <h2>Remarks</h2>
                                </div>
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-edit"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input name="dsc" type="text" value="<?php echo $LvData->disc; ?>"
                                               onkeyup="quantityValidate();" class="form-control" placeholder="Remarks">

                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="dialog-pro dialog">
                                    <button style="margin-left: 300%; margin-top: 10%;" type="submit"
                                            class="btn btn-info">
                                        Update
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>

    </div>
</div>

<!-- Start Footer area-->
<?php $this->load->view('includes/footer'); ?>
<!-- End Footer area-->


</body>

<script>
    //Function for check from to date range
    var dateCheck = function () {
        var stdate = document.getElementById('fromdate').value;
        var enddate = document.getElementById('todate').value;
        var regExp = /(\d{1,2})\/(\d{1,2})\/(\d{2,4})/;

        if (parseInt(stdate.replace(regExp, "$3$2$1")) > parseInt(enddate.replace(regExp, "$3$2$1"))) {
            document.getElementById('message').style.color = 'red';
            document.getElementById('message').innerHTML = 'TO DATE SHOULD LARGER THAN FROM DATE';
        } else {
            document.getElementById('message').style.color = 'green';
            document.getElementById('message').innerHTML = 'DATE RANGE VALIDATED';
        }
    }


</script>

<!-- Data Table JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/data-table/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/data-table/data-table-act.js"></script>

<!-- Notification Alert JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/notification/bootstrap-growl.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/notification/notify.js"></script>


</html>

