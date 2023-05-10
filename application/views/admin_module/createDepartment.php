<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 5/7/2021
 * Time: 9:38 PM
 */
?>

<!doctype html>


<head>
    <title>Create Department | Survey - Elms</title>
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">

    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url(); ?>assets/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url(); ?>assets/font-awesome-4.7.0/css/font-awesome.min.css">

</head>

<body style="padding-top: 250px; padding-bottom: 100px; z-index: 5;">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->

<!-- Start Header Top Area -->
<?php $this->load->view('includes/header'); ?>
<!-- End Header Top Area -->

<!-- Start Navigation Area-->
<?php $this->load->view('includes/navigation'); ?>
<!-- End Navigation Area -->


<!--Create Department view start-->
<div class="form-element-area">
    <div class="container">

        <form name="leaveCreate" method="post"
              action="<?php echo base_url(); ?>index.php/admin_control/create_dept_controller/createDept">
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

                    <div class="form-element-list mg-t-30">
                        <div class="cmp-tb-hd">
                            <h2>Create Department</h2>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-star"></i>
                                    </div>
                                    <div class="bootstrap-select fm-cmp-mg">
                                        <select name="ofz" class="selectpicker" data-live-search="true" required>
                                            <option value="Permanent">Select Office</option>
                                            <?php if ($allOfz != null) {
                                                foreach ($allOfz as $ofz) {
                                                    ?>
                                                    <option value="<?php echo $ofz['ofzId']; ?>"><?php echo $ofz['ofzName']; ?></option>

                                                    <?php
                                                }
                                            } ?>
                                        </select>
                                        <span id="test3"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-star"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="number" id="deptId" name="deptId" class="form-control" required>
                                        <label class="nk-label">Department ID</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-star"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" id="deptName" name="deptName" class="form-control" required>
                                        <label class="nk-label">Department Name</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="nk-int-st">
                                        <div class="dialog-pro dialog">
                                            <button style="margin-left: 1000px;" type="submit"
                                                    class="btn btn-info">
                                                Create
                                            </button>
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

<!-- Data Table area Start-->
<div class="data-table-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="data-table-list">
                    <div class="basic-tb-hd">
                        <h4 style="text-transform: uppercase; color: #666666; ">All Created Departments</h4>
                    </div>
                    <div class="table-responsive">
                        <table id="data-table-basic" class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Office</th>
                                <th>Department Name</th>
                                <th>Create Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if ($DeptsData != null) { ?>

                                <?php $count = 1; ?>

                                <?php foreach ($DeptsData as $data) { ?>

                                    <tr>
                                        <td><?php echo $count; ?></td>
                                        <td><?php echo $data['ofzName']; ?>
                                            </br>(<?php echo $data['ofzId']; ?>)
                                        </td>
                                        <td><?php echo $data['deptName']; ?></br>
                                            (<?php echo $data['deptId']; ?>)
                                        </td>
                                        <td><?php echo $data['createDate']; ?></td>
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

<!--Data table area end-->

<!--Create Department view end-->


<!-- Start Footer area-->
<?php $this->load->view('includes/footer'); ?>
<!-- End Footer area-->


</body>

<script type="text/javascript">

    $(document).ready(function () {
        $('#deptName').click(function () {
            var Id = $('#deptId').val();

            if (Id != '') {
                $.ajax({
                    type: 'POST',
                    data: {deptID: Id},
                    url: '<?php echo base_url();?>index.php/admin_control/create_dept_controller/deptIdCheck',
                    success: function (result) {
                        if (result == 1) {
                            swal({
                                text: "This Department ID is already Registered with the system",
                                type: "error",

                            });
                        } else {

                        }

                    }
                });

            } else {
                swal({
                    text: "Please Enter a Valid Department ID",
                    type: "error",

                });
            }

        });
    });

</script>

<!-- Notification Alert JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/notification/bootstrap-growl.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/notification/notify.js"></script>


</html>
