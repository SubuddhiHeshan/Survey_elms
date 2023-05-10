<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 4/18/2021
 * Time: 12:57 PM
 */ ?>
<!doctype html>


<head>
    <title>Leave Details | Survey - Elms</title>
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

<!--Leave Details View start-->
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
                    <h4 style="text-transform: uppercase; color: #666666; ">Leave Details</h4>
                </div>
                <div class="bsc-tbl-hvr">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <td style="font-size: 16px;"><b>Employee Name :</b></td>
                            <td>
                                <span style="color: #0277CA; font-size:16px;"><?php echo $dtl->fName . ' ' . $dtl->lName; ?></span>
                            </td>
                            <td style="font-size: 16px;"><b>Emp No :</b></td>
                            <td style="font-size: 16px;"><?php echo $dtl->empNo; ?></td>
                            <td style="font-size: 16px;"><b>Gender :</b></td>
                            <td style="font-size: 16px;"><?php echo $dtl->gender; ?></td>

                        </tr>
                        <tr>
                            <td style="font-size: 16px;"><b>Emp Email Id :</b></td>
                            <td style="font-size: 16px;"><?php echo $dtl->email; ?></td>
                            <td style="font-size: 16px;"><b>Emp Contact No :</b></td>
                            <td colspan="3" style="font-size: 16px;"><?php echo $dtl->tele; ?></td>
                        </tr>
                        <tr>
                            <td style="font-size: 16px;"><b>Leave Type :</b></td>
                            <td style="font-size: 16px;"><?php echo $dtl->levName; ?></td>
                            <td style="font-size: 16px;"><b>Leave Date :</b></td>
                            <td style="font-size: 16px;">From <?php echo $dtl->fromDate; ?>
                                To <?php echo $dtl->toDate; ?> </td>
                            <td style="font-size: 16px;"><b>Applied Quantity :</b></td>

                            <?php if ($dtl->applyQty == 0.50) { ?>

                                <td style="font-size: 16px;">Half Day</td>

                            <?php } else { ?>

                                <td style="font-size: 16px;"><?php echo $dtl->applyQty; ?></td>

                            <?php } ?>

                        </tr>
                        <tr>
                            <td style="font-size: 16px;"><b>Posting Date :</b></td>
                            <td style="font-size: 16px;"><?php echo $dtl->applyDate; ?></td>

                            <td style="font-size: 16px;"><b>Leave Description :</b></td>
                            <td colspan="3" style="font-size: 16px;"><?php echo $dtl->disc; ?></td>
                        </tr>
                        <tr>
                            <td style="font-size: 16px;"><b>Leave Status :</b></td>
                            <td colspan="5">
                                <?php if ($dtl->status == 1) { ?>
                                    <span style="color: green">Approved</span>

                                <?php }
                                if ($dtl->status == 2) { ?>
                                    <span style="color: red">Not Approved</span>

                                <?php }
                                if ($dtl->status == 0) { ?>
                                    <span style="color: blue">Waitting for Approval</span>
                                <?php } ?>

                            </td>
                        </tr>
                        <tr>
                            <td style="font-size: 16px;"><b>Admin Remark :</b></td>
                            <td colspan="5" style="font-size: 16px;">
                                <?php if ($dtl->adminRemark == null) { ?>

                                    <span>Waitting for Approval</span>

                                <?php } else { ?>
                                    <span><?php echo $dtl->adminRemark; ?></span>

                                <?php } ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size: 16px;"><b>Admin Action Date :</b></td>
                            <td colspan="5" style="font-size: 16px;">
                                <?php if ($dtl->adminRemarkDate == null) { ?>

                                    <span>NA</span>

                                <?php } else { ?>
                                    <span><?php echo $dtl->adminRemarkDate; ?></span>

                                <?php } ?>

                            </td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <div class="dialog-pro dialog">
                                    <?php if ($_SESSION['user_role'] == 2 || $_SESSION['user_role'] == 3) { ?>
                                        <button type="submit" class="btn btn-info" data-toggle="modal"
                                                disabled="disabled"
                                                data-target="#actionModal"> Take Action
                                        </button>

                                    <?php } else { ?>
                                        <button type="submit" class="btn btn-info" data-toggle="modal"
                                                data-target="#actionModal"> Take Action
                                        </button>

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
<!--Leave Details view end-->

<!--Start Leave  Action Modal-->

<div class="modal fade" id="actionModal" role="dialog">
    <div class="modal-dialog modal-large">
        <div class="modal-content">

            <form name="apprdleaveform" id="apprdleaveform" method="post"
                  action="<?php echo base_url(); ?>index.php/leave_mgt_control/leave_dtl_controller/appdLeave?leaveid=<?php echo $id; ?>&id=<?php echo $dtl->leaveType; ?>&emp=<?php echo $dtl->empNo ?>">
                <div class="modal-header">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-element-list mg-t-30">
                            <div class="cmp-tb-hd">
                                <h2>Leave Take Action</h2>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="nk-int-mk">
                                        <h2>Take Your Action</h2>
                                    </div>
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-star"></i>
                                        </div>

                                        <div class="bootstrap-select fm-cmp-mg form-control">
                                            <select name="actionType" class="selectpicker form-control" required>
                                                <option value="0">Waitting for Approval</option>
                                                <option value="1">Approved</option>
                                                <option value="2">Not Approved</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="nk-int-mk">
                                        <h2>Approved Quantity</h2>

                                    </div>
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-star"></i>
                                        </div>
                                        <div class="nk-int-st">
                                            <input name="appdQty" id="appdQty" type="number" step="0.01"
                                                   onkeyup="ApprovedQtyValidate();" class="form-control"
                                                   placeholder="Quantity" required>
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
                                            <input name="dsc" type="text" onkeyup="ApprovedQtyValidate();"
                                                   class="form-control" placeholder="Remarks" required>

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
<!--End Leave Action Modal-->

<!-- Start Footer area-->
<?php $this->load->view('includes/footer'); ?>
<!-- End Footer area-->


</body>

<script>
    var ApprovedQtyValidate = function () {
        if (parseFloat(document.getElementById('appdQty').value) <= <?php echo $dtl->applyQty; ?>) {
            document.getElementById('msg').style.color = 'green';
            document.getElementById('msg').innerHTML = 'Quantity in range';
        } else {
            document.getElementById('msg').style.color = 'red';
            document.getElementById('msg').innerHTML = 'Approve Quantity Shold Less than or Equal to Applied Quamtity';
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



