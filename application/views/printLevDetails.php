<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 4/25/2021
 * Time: 12:07 PM
 */ ?>

<head>
    <title>Print Leave Details | Survey - Elms</title>
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">
    <!-- Data Table JS
    ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.dataTables.min.css">

<!--    Start Internal Header css input-->
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <!-- font awesome CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.theme.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.transitions.css">
    <!-- meanmenu CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/meanmenu/meanmenu.min.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/normalize.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- jvectormap CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jvectormap/jquery-jvectormap-2.0.3.css">
    <!-- notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/notika-custom-icon.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/wave/waves.min.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="<?php echo base_url(); ?>assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <!-- dialog CSS
      ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dialog/sweetalert2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dialog/dialog.css">

    <!-- bootstrap select CSS
            ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-select/bootstrap-select.css">

<!--    End Internal Header css input-->
<!--    Style for Leave Table -->
    <style>
        table, th, td{
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>

</head>

<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Start Header Top Area -->
<?php //$this->load->view('includes/header'); ?>
<!-- End Header Top Area -->


<?php //$this->load->view('includes/navigation'); ?>

<!--Print Leave Details View start-->
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

            <div class="normal-table-list mg-t-30">
                <div class="basic-tb-hd">
                    <h4 style="text-transform: uppercase; color: #666666; ">Leave Application</h4>
                </div>
                <div class="bsc-tbl-hvr">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <td width="400px" style="font-size: 16px; border-top: 1px solid black;"><b>Employee Name :</b></td>
                            <td style=" border-top: 1px solid black;" width="400px">
                                <span style="color: #0277CA; font-size:16px;"><?php echo $dtl->aplyFname . ' ' . $dtl->aplyLname; ?></span>
                            </td>
                            <td width="400px" style="font-size: 16px; border-top: 1px solid black;"><b>Emp No :</b></td>
                            <td width="400px" style="font-size: 16px; border-top: 1px solid black;"><?php echo $dtl->aplyEmp; ?></td>
                            <td width="200px" style="font-size: 16px; border-top: 1px solid black;"><b>Gender :</b></td>
                            <td width="400px" style="font-size: 16px; border-top: 1px solid black;"><?php echo $dtl->gender; ?></td>

                        </tr>
                        <tr>
                            <td style="font-size: 16px;"><b>Office :</b></td>
                            <td style="font-size: 16px;"><?php echo $dtl->ofzName; ?></td>
                            <td style="font-size: 16px;"><b>Department :</b></td>
                            <td style="font-size: 16px;"><?php echo $dtl->deptName; ?></td>
                            <td style="font-size: 16px;"><b>Designation :</b></td>
                            <td style="font-size: 16px;"><?php echo $dtl->aplyDeg; ?></td>

                        </tr>
                        <tr>
                            <td style="font-size: 16px;"><b>Leave Type :</b></td>
                            <td style="font-size: 16px;"><?php echo $dtl->levName; ?></td>
                            <td style="font-size: 16px;"><b>Leave Date :</b></td>
                            <td style="font-size: 16px;">From <?php echo $dtl->fromDate; ?>
                                To <?php echo $dtl->toDate; ?> </td>
                            <td style="font-size: 16px;"><b>Applied Qty :</b></td>

                            <?php if ($dtl->applyQty == 0.50) { ?>

                                <td style="font-size: 16px;">Half Day</td>

                            <?php } else { ?>

                                <td style="font-size: 16px;"><?php echo $dtl->applyQty; ?></td>

                            <?php } ?>
                        </tr>

                        <tr>
                            <td style="font-size: 16px;"><b>Approved Qty :</b></td>

                            <?php if ($dtl->aprdQty == 0.50) { ?>

                                <td style="font-size: 16px;">Half Day</td>

                            <?php } else { ?>

                                <td style="font-size: 16px;"><?php echo $dtl->aprdQty; ?></td>

                            <?php } ?>

                            <td style="font-size: 16px;"><b>Applied Date :</b></td>
                            <td style="font-size: 16px;"><?php echo $dtl->applyDate; ?></td>
                            <td style="font-size: 16px;"><b>Remark :</b></td>
                            <td style="font-size: 16px;"><?php echo $dtl->disc; ?></td>

                        </tr>

                        <tr>
                            <td style="font-size: 16px;"><b>Approved By :</b></td>
                            <td>
                                <span style="color: #0277CA; font-size:16px;"><?php echo $dtl->apdFname . ' ' . $dtl->apdLname; ?></span>
                            </td>
                            <td style="font-size: 16px;"><b>Approved Designation :</b></td>
                            <td style="font-size: 16px;"><?php echo $dtl->aprdDeg; ?></td>
                            <td style="font-size: 16px;"><b>Approved Office :</b></td>
                            <td style="font-size: 16px;"><?php echo $dtl->aprdOfz; ?></td>

                        </tr>

                        <tr>
                            <td style="font-size: 16px;"><b>Leave Status :</b></td>
                            <td colspan="5">
                                <?php if ($dtl->status == 1) { ?>
                                    <b><span style="color: green">Approved</span></b>

                                <?php }
                                if ($dtl->status == 2) { ?>
                                    <b><span style="color: red">Not Approved</span></b>

                                <?php }
                                if ($dtl->status == 0) { ?>
                                    <b><span style="color: blue">Waitting for Approval</span></b>
                                <?php } ?>

                            </td>
                        </tr>
<!--                        <tr>-->
<!--                            <td style="font-size: 16px;"><b>Admin Remark :</b></td>-->
<!--                            <td colspan="5" style="font-size: 16px;">-->
<!--                                --><?php //if ($dtl->adminRemark == null) { ?>
<!---->
<!--                                    <span>Waitting for Approval</span>-->
<!---->
<!--                                --><?php //} else { ?>
<!--                                    <span>--><?php //echo $dtl->adminRemark; ?><!--</span>-->
<!---->
<!--                                --><?php //} ?>
<!--                            </td>-->
<!--                        </tr>-->
<!--                        <tr>-->
<!--                            <td style="font-size: 16px;"><b>Admin Action Date :</b></td>-->
<!--                            <td colspan="5" style="font-size: 16px;">-->
<!--                                --><?php //if ($dtl->adminRemarkDate == null) { ?>
<!---->
<!--                                    <span>NA</span>-->
<!---->
<!--                                --><?php //} else { ?>
<!--                                    <span>--><?php //echo $dtl->adminRemarkDate; ?><!--</span>-->
<!---->
<!--                                --><?php //} ?>
<!---->
<!--                            </td>-->
<!--                        </tr>-->
                        <tr>
                            <td colspan="6">
                                <div class="dialog-pro dialog">
                                    <a class="btn btn-info" data-ma-action="print"> <i
                                                class="fa fa-print fa-2x aria-hidden=" true"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Print Leave Details view end-->

<!-- Start Footer area-->
<!-- jquery
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/vendor/jquery-1.12.4.min.js"></script>
<!-- bootstrap JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<!-- wow JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/wow.min.js"></script>
<!-- price-slider JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/jquery-price-slider.js"></script>
<!-- owl.carousel JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js"></script>
<!-- scrollUp JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/jquery.scrollUp.min.js"></script>
<!-- meanmenu JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/meanmenu/jquery.meanmenu.js"></script>
<!-- counterup JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/counterup/jquery.counterup.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/counterup/waypoints.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/counterup/counterup-active.js"></script>
<!-- mCustomScrollbar JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<!-- jvectormap JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jvectormap/jvectormap-active.js"></script>
<!-- sparkline JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/sparkline/jquery.sparkline.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/sparkline/sparkline-active.js"></script>
<!-- flot JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/flot/jquery.flot.js"></script>
<script src="<?php echo base_url(); ?>assets/js/flot/jquery.flot.resize.js"></script>
<script src="<?php echo base_url(); ?>assets/js/flot/jquery.flot.pie.js"></script>
<script src="<?php echo base_url(); ?>assets/js/flot/jquery.flot.tooltip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/flot/jquery.flot.orderBars.js"></script>
<script src="<?php echo base_url(); ?>assets/js/flot/curvedLines.js"></script>
<script src="<?php echo base_url(); ?>assets/js/flot/flot-active.js"></script>
<!-- knob JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/knob/jquery.knob.js"></script>
<script src="<?php echo base_url(); ?>assets/js/knob/jquery.appear.js"></script>
<script src="<?php echo base_url(); ?>assets/js/knob/knob-active.js"></script>
<!--  wave JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/wave/waves.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/wave/wave-active.js"></script>
<!--  Chat JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/chat/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/chat/jquery.chat.js"></script>
<!--  todo JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/todo/jquery.todo.js"></script>
<!-- plugins JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/plugins.js"></script>
<!-- main JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
</body>

<!--  dialog JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/dialog/sweetalert2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/dialog/dialog-message.js"></script>
<!--<script src="js/dialog/dialog-active.js"></script>-->
<!--  Chat JS-->

<!-- bootstrap select JS
       ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/bootstrap-select/bootstrap-select.js"></script>

<?php //$this->load->view('includes/footer'); ?>
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


<script>
    (function ($) {
        "use strict";

        $("html").on("click", "[data-ma-action]", function (e) {
            e.preventDefault();
            var $this = $(this),
                action = $(this).data("ma-action");
            switch (action) {
                case "nk-login-switch":
                    var loginblock = $this.data("ma-block"),
                        loginParent = $this.closest(".nk-block");
                    loginParent.removeClass("toggled"), setTimeout(function () {
                        $(loginblock).addClass("toggled")
                    });
                    break;
                case "print":
                    window.print();
                    break;
            }
        });

    })(jQuery);

</script>


<!-- Print JS
    ============================================ -->
<!--<script src="--><?php //echo base_url(); ?><!--assets/js/login/login-action.js"></script>-->
<!---->


</html>




