<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 5/5/2021
 * Time: 9:32 PM
 */ ?>

<!doctype html>


<head>
    <title>Engage Task | Survey - Elms</title>
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


<!--Engage Task area start-->

<!-- Data Table area Start-->
<div class="data-table-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="data-table-list">
                    <div class="basic-tb-hd">
                        <h4 style="text-transform: uppercase; color: #666666; ">Assigned Tasks</h4>
                    </div>

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

                    <div class="table-responsive">
                        <table id="data-table-basic" class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Task Name</th>
                                <th>Assigned By</th>
                                <th>Deadline</th>
                                <th>Priority</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if ($taskAssignData != null) { ?>

                                <?php $count = 1; ?>

                                <?php foreach ($taskAssignData as $taskdata) { ?>

                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td style="text-transform: capitalize;"><?php echo $taskdata['workName']; ?></td>

                                        <td><span style="color: #0277CA; font-size:14px;"><b><?php echo $taskdata['fName'] . " " . $taskdata['lName'] ?> </br>
                                                    (<?php echo $taskdata['dName'] . ' - ' . $taskdata['deptName'] ?>
                                                    )</b></span></td>
                                        <td><?php echo $taskdata['deadline']; ?></td>

                                        <td>
                                            <?php if ($taskdata['priorityLevel'] == 1) { ?>
                                                <span style="color: red">High</span>

                                            <?php }
                                            if ($taskdata['priorityLevel'] == 2) { ?>
                                                <span style="color: green">Medium</span>

                                            <?php }
                                            if ($taskdata['priorityLevel'] == 3) { ?>
                                                <span style="color: blue">Low</span>
                                            <?php } ?>

                                        </td>

                                        <td>
                                            <button onclick="engageTask(<?php echo $taskdata['workId']; ?>)"
                                                    class="btn btn-primary notika-btn-primary">Accept
                                            </button>
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

<!--Engage Task area end-->

<!-- Start Footer area-->
<?php $this->load->view('includes/footer'); ?>
<!-- End Footer area-->


</body>

<script type="text/javascript">

    function engageTask(num) {
        var wId = num;
        swal({
            title: "Are you sure?",
            text: 'Do you want to accept this task',
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, Accept",
            cancelButtonText: "No, Decline",
        }).then(function (isConfirm) {
            if (isConfirm) {
                $.ajax({
                    type: 'POST',
                    data: {workId: wId},
                    url: '<?php echo base_url();?>index.php/work_assign_control/engage_task_controller/setTaskAccept',
                    success: function (result) {
                        if (result == 1) {
                            swal({
                                text: "Successfully Enrolled with Task",
                                type: "success",

                            });
                        } else {
                            swal({
                                text: "Already Enrolled",
                                type: "error",

                            });
                        }
                    }
                });

            } else {
                swal("Cancelled", "Not Accepted", "error");
            }
        });
    };

</script>

<!-- Notification Alert JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/notification/bootstrap-growl.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/notification/notify.js"></script>

</html>