<?php
//error_reporting(0);
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 1/28/2021
 * Time: 6:53 PM
 */ ?>

<!doctype html>
<head>
    <title>Apply Leave | Survey - Elms</title>
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">

    <!-- datapicker CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/datapicker/datepicker3.css">

    <!-- dropzone CSS
    ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dropzone/dropzone.css">


    <style type="text/css">
        .select-container select {
            width: 100%;
        }
    </style>
</head>

<body style="padding-top: 250px; padding-bottom: 100px; z-index: 5;">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->

<!-- Start Header Top Area -->
<?php $this->load->view('includes/header'); ?>
<!-- End Header Top Area -->

<!--Start Navigation Area-->
<?php $this->load->view('includes/navigation'); ?>
<!--End Navigation Area-->

<!--Apply Leave Area Strat-->

<!-- Start Status area -->
<div class="notika-status-area">
    <div class="container">
        <div class="row">
            <?php $count1 = 1; ?>
            <?php foreach ($totalLeaves as $bar) { ?>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter"><?php echo $bar['qty']; ?></span></h2>
                            <p><?php echo $bar['levName'] . " " . "Leave Balance" ?></p>
                        </div>
                        <div class="sparkline-bar-stats1">9,4,8,6,5,6,4,8,3,5,9,5</div>
                    </div>
                </div>
                <?php $count1++;
            } ?>
        </div>
    </div>
</div>
<!-- End Status area-->

<div class="form-element-area">
    <div class="container">
        <div class="row">
            <form name="applyleaveform" id="applyleaveform" method="post"
                  action="<?php echo base_url(); ?>index.php/apply_leave_controller/insertLeaves">

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
                            <h2>Apply Leave</h2>
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
                                            <?php $count = 1; ?>
                                            <?php foreach ($totalLeaves as $leaves) { ?>
                                                <option value="<?php echo $leaves['levId']; ?>"><?php echo $leaves['levName']; ?></option>

                                                <?php $count++;
                                            } ?>
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
                                               placeholder="mm/dd/yyyy" required>
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
                                               placeholder="mm/dd/yyyy" required>
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
                                        <input name="reqQty" id="qty"  type="number" step="0.01" class="form-control" placeholder="Quantity" required>
                                    </div>
                                    <span id="newMsg"></span>
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
                                        <input name="dsc" type="text"  class="form-control" onclick="quantityValidate();"
                                               placeholder="Remarks" required>

                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="dialog-pro dialog">
                                    <button style="margin-left: 300%; margin-top: 10%;" type="submit"
                                            class="btn btn-info">
                                        Apply
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

<!-- Dropzone area Start-->
<!--<div class="dropzone-area">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">-->
<!--                <div class="dropdone-nk mg-t-30">-->
<!--                    <div class="cmp-tb-hd">-->
<!--                        <h2>Attachments Uploader</h2>-->
<!--                        <p>Please Upload your Medical reports or attachmets if any when you have necessity for approval</p>-->
<!--                    </div>-->
<!--                    <div id="dropzone1" class="multi-uploader-cs">-->
<!--                        <form action="/upload" class="dropzone dropzone-nk needsclick" id="demo1-upload">-->
<!--                            <div class="dz-message needsclick download-custom">-->
<!--                                <i class="notika-icon notika-cloud"></i>-->
<!--                                <h2>Drop files here or click to upload.</h2>-->
<!--                                <p><span class="note needsclick">(Please Select apprropriate files when uploading. <strong>Max file size is 5MB</strong>)</span>-->
<!--                                </p>-->
<!--                            </div>-->
<!--                        </form>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!-- Dropzone area End-->


<!--Apply Leave Area End-->


<!-- Start Footer area-->
<?php $this->load->view('includes/footer'); ?>
<!-- End Footer area-->


</body>
<!-- dropzone JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/dropzone/dropzone.js"></script>

<!--Input Mask JS-->
<script src="<?php echo base_url(); ?>assets/js/jasny-bootstrap.min.js"></script>

<!--Date Picker JS-->
<script src="<?php echo base_url(); ?>assets/js/datapicker/datepicker-active.js"></script>
<script src="<?php echo base_url(); ?>assets/js/datapicker/bootstrap-datepicker.js"></script>

<!-- Notification Alert JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/notification/bootstrap-growl.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/notification/notify.js"></script>

<script type="text/javascript">

    $(document).ready(function () {
        $('#qty').click(function () {

            var startD = document.getElementById('fromdate').value;
            var toDate = document.getElementById('todate').value;


            // var dif_time = toDate.getTime() - startD.getTime();
            // var dateqty = 24 * 60 * 60 * 1000;
            //
            // var xx = Math.ceil((toDate - startD) / dateqty);
            //
            $.ajax({
                type: 'POST',
                data: {Start: startD, End: toDate},
                url: '<?php echo base_url();?>index.php/page_controller/checkQty',
                success: function (result) {
                    // alert(result);
                    document.getElementById('qty').value = result;


                }
            });
        });
    });

    //Function for check from to date range
    var dateCheck = function () {
        var stdate = document.getElementById('fromdate').value;
        var enddate = document.getElementById('todate').value;

        var regExp = /(\d{1,2})\/(\d{1,2})\/(\d{2,4})/;

        var Stdate1 = parseInt(stdate.replace(regExp, "$3$2$1"));
        var etDate1 = parseInt(enddate.replace(regExp, "$3$2$1"));

        if (parseInt(stdate.replace(regExp, "$3$2$1")) > parseInt(enddate.replace(regExp, "$3$2$1"))) {

            document.getElementById('message').style.color = 'red';
            document.getElementById('message').innerHTML = 'TO DATE SHOULD LARGER THAN FROM DATE';
        } else {

            document.getElementById('message').style.color = 'green';
            document.getElementById('message').innerHTML = 'DATE RANGE VALIDATED';
        }
    }

    var quantityValidate = function () {
        if (parseFloat(document.getElementById('qty').value) < 0.5) {
            document.getElementById('msg').style.color = 'red';
            document.getElementById('msg').innerHTML = 'Should be apply for larger than a half day';
        } else {
            document.getElementById('msg').style.color = 'green';
            document.getElementById('msg').innerHTML = 'Quantity in range';

        }
    }

    //Function for check user input date pattern
    // var datePatternValidate = function () {
    //
    //     var stdate = document.getElementById('fromdate').value;
    //     var enddate = document.getElementById('todate').value;
    //     var re = /^\d{1,2}\/\d{1,2}\/\d{4}$/;
    //
    //     if (stdate.match(re) && enddate.match(re)) {
    //         //Date Checked
    //     } else {
    //         alert("Invalid Date Input dd/mm/yyyy")
    //     }
    //
    // }


</script>


</html>