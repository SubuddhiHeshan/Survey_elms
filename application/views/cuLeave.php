<?php
error_reporting(0);
//error_reporting(0);
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 1/27/2021
 * Time: 12:47 PM
 */ ?>

<!doctype html>


<head>
    <title>Create Leave | Survey - Elms</title>
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


<!--edit profile view start-->
<!-- Form Element area Start-->
<div class="form-element-area">
    <div class="container">

        <form name="leaveCreate" method="post" action="<?php echo base_url(); ?>index.php/leave_controller/createLeave">
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
                            <h2>Create Leave</h2>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-star"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" name="lvName" class="form-control" required onkeyup="validate1()">
                                        <label class="nk-label">Leave Name</label>
                                        <span id="test1"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int float-lb floating-lb">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-next"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="number" name="lvQty" class="form-control" required onkeyup="validate2()">
                                        <label class="nk-label">Leave Quantity</label>
                                        <span id="test2"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-star"></i>
                                    </div>
                                    <div class="bootstrap-select fm-cmp-mg">
                                        <select name="ucarder" class="selectpicker" required onkeyup="validate3()">
                                            <option value="">Eligibility</option>
                                            <option value="Permanent">Permanent Staff</option>
                                            <option value="Trainee">Trainee Staff</option>
                                        </select>
                                        <span id="test3"></span>
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
                                    <textarea name="lvDsc" class="form-control" rows="2"
                                              placeholder="Please add some description about leave to the box..."></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="dialog-pro dialog">
                                    <button style="margin-left: 300%; margin-top: 5%;" type="submit"
                                            class="btn btn-info">
                                        Update
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </form>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="invoice-sp">
                    <table class="table table-hover" name="data">
                        <thead>
                        <tr>
                            <th>Leave ID</th>
                            <th>Leave Name</th>
                            <th>Leave Quantity</th>
                            <th>Leave Eligibility</th>
                            <th>Leave Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $count = 1; ?>

                        <?php foreach ($leaves as $lev) { ?>
                            <tr>
                                <td><?php echo $lev['levId']; ?></td>
                                <td><?php echo $lev['levName']; ?></td>
                                <td><?php echo $lev['levQty']; ?></td>
                                <td><?php echo $lev['userCarder']; ?></td>
                                <td><?php echo $lev['levDisc']; ?></td>
                            </tr>

                            <?php $count++;
                        } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--Modal strats here-->
        <div class="modal fade" id="myModalone" role="dialog">
            <div class="modal-dialog modals-default">
                <div class="modal-content">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-element-list mg-t-30">
                                <div class="cmp-tb-hd">
                                    <h2>Update Leave</h2>
                                    <p>You can Update or Deactive leave here</p>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-star"></i>
                                        </div>
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control" Placeholder="Leave Name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-star"></i>
                                        </div>
                                        <div class="nk-int-st">
                                            <input type="number" class="form-control" Placeholder="Leave Quantity"
                                                   required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-star"></i>
                                        </div>
                                        <div class="bootstrap-select fm-cmp-mg">
                                            <select name="ucarder" class="selectpicker" required>
                                                <option value="">Eligibility</option>
                                                <option value="Permanent">Permanent Staff</option>
                                                <option value="Trainee">Trainee Staff</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-star"></i>
                                        </div>
                                        <div class="bootstrap-select fm-cmp-mg">
                                            <select name="status" class="selectpicker" required>
                                                <option value="">Leave Status</option>
                                                <option value="1">Active</option>
                                                <option value="2">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                    <div class="form-group ic-cmp-int float-lb form-elet-mg">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-edit"></i>
                                        </div>
                                        <div class="nk-int-st">
                                    <textarea name="lvDsc" class="form-control" rows="2"
                                              placeholder="Please add some description about leave to the box..."></textarea>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="modal-footer" style="margin-top: 20px;">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Save changes</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
</div>


<!--Create Leave view end-->


<!-- Start Footer area-->
<?php $this->load->view('includes/footer'); ?>
<!-- End Footer area-->


</body>

<!-- Notification Alert JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/notification/bootstrap-growl.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/notification/notify.js"></script>


<script type="text/javascript">


    //Parameter

    function parameter(num) {
        swal({
            title: "Are you sure?",
            text: "Do you want to Update this user",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, Update",
            cancelButtonText: "No, cancel",
        }).then(function (isConfirm) {
            if (isConfirm) {
                var result = "Deleted Succesfully";
                swal("Deleted!", result);
            } else {
                swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
        });
    };



    // /test ui
    var validate1 = function () {

        document.getElementById('test1').style.color = 'red';
        document.getElementById('test1').innerHTML = 'Leave already exsist';


    }
    var validate2 = function () {

        document.getElementById('test2').style.color = 'red';
        document.getElementById('test2').innerHTML = 'Leave Quantity should Larger than 0';




    }

    var validate3 = function () {

        document.getElementById('test3').style.color = 'red';
        document.getElementById('test3').innerHTML = 'Please select an appropriate eligibility data';




    }

    var validate4 = function () {

        document.getElementById('test4').style.color = 'red';
        document.getElementById('test4').innerHTML = 'Please Select a Designation';

    }


</script>


</html>