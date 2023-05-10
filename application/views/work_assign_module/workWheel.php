<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 5/6/2021
 * Time: 12:10 PM
 */ ?>
<!doctype html>


<head>
    <title>Work Wheel | Survey - Elms</title>
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">


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


<!--Update Task area start-->

<!-- Data Table area Start-->
<div class="data-table-area">
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


                <div class="data-table-list">
                    <div class="basic-tb-hd">
                        <h4 style="text-transform: uppercase; color: #666666; ">Engaged Tasks</h4>
                    </div>
                    <div class="table-responsive">
                        <table id="data-table-basic" class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Task Name</th>
                                <th>Task Description</th>
                                <th>Deadline</th>
                                <th>Priority Level</th>
                                <th>Progress</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php if ($enrollTasks != null) {
                                $count = 1;
                                ?>
                                <?php foreach ($enrollTasks as $enTask) { ?>

                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td><?php echo $enTask['workName']; ?></td>
                                        <td><?php echo $enTask['assignDisc']; ?></td>
                                        <td><?php echo $enTask['deadline']; ?></td>
                                        <td>
                                            <?php if ($enTask['priorityLevel'] == 1) { ?>
                                                <span style="color: red">High</span>

                                            <?php }
                                            if ($enTask['priorityLevel'] == 2) { ?>
                                                <span style="color: green">Medium</span>

                                            <?php }
                                            if ($enTask['priorityLevel'] == 3) { ?>
                                                <span style="color: blue">Low</span>
                                            <?php } ?>

                                        </td>

                                        <td>
                                            <?php if ($enTask['worStage'] == 1) { ?>
                                                <span style="color: red">0% Completed</span>

                                            <?php }
                                            if ($enTask['worStage'] == 2) { ?>
                                                <span style="color: black">25% Completed</span>

                                            <?php }
                                            if ($enTask['worStage'] == 3) { ?>
                                                <span style="color: darkred">50% Completed</span>
                                            <?php }

                                            if ($enTask['worStage'] == 4) { ?>
                                                <span style="color: green">75% Completed</span>
                                            <?php }

                                            if ($enTask['worStage'] == 5) { ?>
                                                <span style="color: blue">100% Completed</span>
                                            <?php } ?>
                                        </td>

                                        <td>
                                            <a href="<?php echo base_url(); ?>index.php/work_assign_control/task_details_controller/taskDetailsView?taskId=<?php echo $enTask['workId']; ?>">
                                                <button class="btn btn-primary notika-btn-primary">View Details
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
        </div>
    </div>
</div>
<!-- Data Table area End-->

<!--Update Task area end-->

<!-- Start Footer area-->
<?php $this->load->view('includes/footer'); ?>
<!-- End Footer area-->


</body>


<!-- Notification Alert JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/notification/bootstrap-growl.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/notification/notify.js"></script>

</html>
