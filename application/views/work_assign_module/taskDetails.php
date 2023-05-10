<?php error_reporting(0);
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 5/6/2021
 * Time: 1:52 PM
 */ ?>
<!doctype html>


<head>
    <title>Task Update | Survey - Elms</title>
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">

    <!-- Range Slider CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/themesaller-forms.css">


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


<!--Task Details area start-->
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
            <div class="normal-table-list mg-t-30">
                <div class="basic-tb-hd">
                    <h4 style="text-transform: uppercase; color: #666666; ">Task Details</h4>
                </div>
                <div class="bsc-tbl-hvr">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <td style="font-size: 16px;"><b>Task Name :</b></td>

                            <td style="font-size: 16px;"><?php echo $tskDtl->workName; ?></td>

                            <td style="font-size: 16px;"><b>Task Assign By :</b></td>
                            <td>
                                <span style="color: #0277CA; font-size:16px;"><?php echo $tskDtl->asgnByFname . ' ' . $tskDtl->asgByLname; ?></span>
                            </td>
                            <td style="font-size: 16px;"><b>Task Assign To :</b></td>
                            <td>
                                <span style="color: #0277CA; font-size:16px;"><?php echo $tskDtl->asgToFname . ' ' . $tskDtl->asgToLname; ?></span>
                            </td>

                        </tr>
                        <tr>
                            <td style="font-size: 16px;"><b>Task Stage :</b></td>

                            <?php if ($tskDtl->stage == 1) { ?>

                                <td style="font-size: 16px;">Engage</td>

                            <?php } else { ?>

                                <td style="font-size: 16px;">Not Accepted</td>

                            <?php } ?>

                            <td style="font-size: 16px;"><b>Task Deadline :</b></td>
                            <td colspan="3" style="font-size: 16px;"><?php echo $tskDtl->deadline; ?></td>
                        </tr>
                        <tr>
                            <td style="font-size: 16px;"><b>Start Date :</b></td>
                            <?php if ($tskDtl->startDate == null) { ?>

                                <td style="font-size: 16px;">Not Started</td>

                            <?php } else { ?>

                                <td style="font-size: 16px;"><?php echo $tskDtl->startDate; ?></td>

                            <?php } ?>

                            <td style="font-size: 16px;"><b>End Date :</b></td>

                            <?php if ($tskDtl->doneDate == null) { ?>

                                <td style="font-size: 16px;">Not Finished</td>

                            <?php } else { ?>

                                <td style="font-size: 16px;"><?php echo $tskDtl->doneDate; ?></td>

                            <?php } ?>

                            <td style="font-size: 16px;"><b>Progress Remark :</b></td>

                            <?php if ($tskDtl->workRemark == null) { ?>

                                <td style="font-size: 16px;">N/A</td>

                            <?php } else { ?>

                                <td style="font-size: 16px;"><?php echo $tskDtl->workRemark; ?></td>

                            <?php } ?>

                        </tr>
                        <tr>
                            <td style="font-size: 16px;"><b>Assign Date :</b></td>
                            <td style="font-size: 16px;"><?php echo $tskDtl->assignDate; ?></td>

                            <td style="font-size: 16px;"><b>Task Description :</b></td>
                            <td colspan="3" style="font-size: 16px;"><?php echo $tskDtl->assignDisc; ?></td>
                        </tr>
                        <tr>
                            <td style="font-size: 16px;"><b>Priority Level :</b></td>
                            <td colspan="5">
                                <?php if ($tskDtl->priorityLevel == 1) { ?>
                                    <span style="color: red">High</span>

                                <?php }
                                if ($tskDtl->priorityLevel == 2) { ?>
                                    <span style="color: green">Medium</span>

                                <?php }
                                if ($tskDtl->priorityLevel == 3) { ?>
                                    <span style="color: blue">Low</span>
                                <?php } ?>

                            </td>
                        </tr>
                        <tr>
                            <td style="font-size: 16px;"><b>Task Progress :</b></td>
                            <td colspan="5" style="font-size: 16px;">
                                <?php if ($tskDtl->worStage == 0) { ?>
                                    <span>N/A</span>

                                <?php }
                                if ($tskDtl->worStage == 1) { ?>
                                    <span style="color: red">0% Completed</span>

                                <?php }
                                if ($tskDtl->worStage == 2) { ?>
                                    <span style="color: black">25% Completed</span>

                                <?php }
                                if ($tskDtl->worStage == 3) { ?>
                                    <span style="color: darkred">50% Completed</span>
                                <?php }

                                if ($tskDtl->worStage == 4) { ?>
                                    <span style="color: green">75% Completed</span>
                                <?php }

                                if ($tskDtl->worStage == 5) { ?>
                                    <span style="color: blue">100% Completed</span>
                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <div class="dialog-pro dialog">
                                    <?php if ($_SESSION['user_role'] == 1 || $_SESSION['user_role'] == 2) { ?>
                                        <button type="submit" class="btn btn-info" data-toggle="modal"
                                                disabled="disabled"
                                                data-target="#actionModal"> Update Progress
                                        </button>

                                    <?php } else {

                                        if ($tskDtl->worStage == 5) {
                                            ?>
                                            <button type="submit" class="btn btn-info" disabled="disabled"
                                                    data-toggle="modal"
                                                    data-target="#actionModal"> Update Progress
                                            </button>

                                        <?php } else { ?>
                                            <button type="submit" class="btn btn-info" data-toggle="modal"
                                                    data-target="#actionModal"> Update Progress
                                            </button>

                                        <?php } ?>
                                    <?php } ?>
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

<!--Task Details area end-->
<!--Start Task Action Modal-->
<div class="modal fade" id="actionModal" role="dialog">
    <div class="modal-dialog modal-large">
        <div class="modal-content">
            <form name="taskProgress" id="taskProgress" method="post"
                  action="<?php echo base_url(); ?>index.php/work_assign_control/task_details_controller/updateTaskProgress?taskID=<?php echo $id; ?>">
                <div class="modal-header">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-element-list mg-t-30">
                            <div class="cmp-tb-hd">
                                <h2>Task Progress Update</h2>
                            </div>
                            <div class="row">


                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-star"></i>
                                        </div>

                                        <div class="themesaller-forms mg-t-30">
                                            <div class="spacer-b16a">
                                                <label for="bedrooms">Task Progress :
                                                    </br>
                                                </label>
                                                <input type="text" id="progress" name="progress" class="slider-input">
                                            </div>
                                            <div class="slider-wrapper blue-slider">
                                                <div id="slider3"></div>
                                            </div>
                                        </div>
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
                                            <input name="dsc" type="text" class="form-control" placeholder="Remarks"
                                                   required>

                                        </div>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-default">Submit</button>
                                    <button type="reset" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>
</div>
<!--End Task Action Modal-->


<!-- Start Footer area-->
<?php $this->load->view('includes/footer'); ?>
<!-- End Footer area-->


</body>

<script type="text/javascript">

    $("#slider3").slider({
        range: "min",
        min: 1,
        max: 5,
        value: <?php echo $tskDtl->worStage; ?>,
        slide: function (event, ui) {
            if (ui.value == 1) {
                $("#progress").val("0% Completed");

            }
            if (ui.value == 2) {
                $("#progress").val("25% Completed");

            }
            if (ui.value == 3) {
                $("#progress").val("50% Completed");

            }
            if (ui.value == 4) {
                $("#progress").val("75% Completed");

            }
            if (ui.value == 5) {
                $("#progress").val("100% Completed");

            }
        }
    });

    $("#progress").val(
        $("#slider3").slider("value")
    );
</script>

<!-- rangle-slider JS
    ============================================ -->
<!--<script src="--><?php //echo base_url(); ?><!--assets/js/rangle-slider/jquery-ui-1.10.4.custom.min.js"></script>-->
<!--<script src="--><?php //echo base_url(); ?><!--assets/js/rangle-slider/jquery-ui-touch-punch.min.js"></script>-->
<!--<script src="--><?php //echo base_url(); ?><!--assets/js/rangle-slider/rangle-active.js"></script>-->


<!-- Notification Alert JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/notification/bootstrap-growl.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/notification/notify.js"></script>

</html>

