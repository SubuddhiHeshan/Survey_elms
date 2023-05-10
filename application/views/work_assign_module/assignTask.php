<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 5/4/2021
 * Time: 8:47 PM
 */ ?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Task Assign | Survey - Elms</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- favicon
       ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">


</head>

<body style="padding-top: 250px; padding-bottom: 100px; z-index: 5;">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->

<!--<start Header Top Area>-->
<?php $this->load->view('includes/header'); ?>
<!-- End Header Top Area -->

<!--Strat Main Menu Area-->
<?php $this->load->view('includes/navigation'); ?>
<!--End Main Menu Area-->


<!-- Start Form area -->
<div class="container">
    <div class="row">
        <form name="leaveCreate" method="post"
              action="<?php echo base_url(); ?>index.php/work_assign_control/work_assign_controller/setTask">
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

                <div class="form-element-list mg-t-30">
                    <div class="cmp-tb-hd">
                        <h2>Assign Task</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="form-group ic-cmp-int float-lb floating-lb">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-star"></i>
                                </div>
                                <div class="nk-int-st">
                                    <input type="text" name="taskName" class="form-control" required>
                                    <label class="nk-label">Task Name</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-star"></i>
                                </div>
                                <div class="bootstrap-select fm-cmp-mg">
                                    <select name="assign" class="selectpicker" data-live-search="true" required>
                                        <option value="">Assign To</option>

                                        <?php if ($taskUsers != null) {
                                            foreach ($taskUsers as $users) {
                                                if ($users['empNo'] != $_SESSION['emp']) {
                                                    ?>
                                                    <option value="<?php echo $users['empNo']; ?>"><?php echo $users['fName'] . ' ' . $users['lName']; ?></option>

                                                    <?php
                                                }
                                                ?>

                                            <?php }
                                        } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-star"></i>
                                </div>
                                <div class="bootstrap-select fm-cmp-mg">
                                    <select name="priority" class="selectpicker" required>
                                        <option value="">Priority Level</option>
                                        <option value="1">High</option>
                                        <option value="2">Medium</option>
                                        <option value="3">Low</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                            <div class="form-group ic-cmp-int">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-star"></i>
                                </div>
                                <div class="form-group nk-datapk-ctm form-elet-mg" id="data_1">
                                    <div class="input-group date nk-int-st">
                                        <span class="input-group-addon"></span>
                                        <label>Select Deadline</label>
                                        <input type="text" name="deadline" class="form-control" value="05/09/2021"
                                               required>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group ic-cmp-int float-lb form-elet-mg">
                                <div class="form-ic-cmp">
                                    <i class="notika-icon notika-edit"></i>
                                </div>
                                <div class="nk-int-st">
                                    <textarea name="taskDsc" class="form-control" rows="3"
                                              placeholder="Please add some description about Task to the box..."></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="dialog-pro dialog">
                                <button style="margin-left: 300%; margin-top: 5%;" type="submit"
                                        class="btn btn-info">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End Form area-->


<!-- Start Footer area-->
<?php $this->load->view('includes/footer'); ?>
<!--<End Footer Area >-->

</body>

<!-- Notification Alert JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/notification/bootstrap-growl.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/notification/notify.js"></script>


</html>



