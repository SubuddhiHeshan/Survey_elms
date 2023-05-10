<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 5/2/2021
 * Time: 8:50 PM
 */ ?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login Creation | Survey - Elms</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- favicon
       ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">

    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/wave/waves.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/wave/button.css">

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
        <form name="createEmployee" method="post"
              action="<?php echo base_url(); ?>index.php/create_login_controller/createLogin">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-example-wrap mg-t-30">
                            <div class="basic-tb-hd">
                                <h4 style="text-transform: uppercase; color: #666666; ">Create User Login</h4>
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
                                                aria-hidden="true"><i class="notika-icon notika-close"></i></span>
                                    </button>
                                    <a href="" class="alert-link"><?php echo $_SESSION['error']; ?></a></div>

                                <?php
                            } ?>

                            <div id="employee_details">


                                <div class="form-example-int form-horizental">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                <label class="hrzn-fm">Employee No</label>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                                                <div class="nk-int-st">
                                                    <input type="number" id="empNo" name="empNo"
                                                           style="font-size: 14px;"
                                                           class="form-control input-sm" placeholder="Enter Employee No"
                                                           required>
                                                    <span id="msg1"></span>
                                                </div>
                                            </div>
                                            <a><i id="find" class="fa fa-search fa-2x"></i></a>
                                            <!--                                            <button id-="uservalidate">Check Employee</a></button>-->
                                            <!--                                            <button href="-->
                                            <?php //echo base_url(); ?><!--index.php/create_login_controller/empNoValidate" id="find" class="btn btn-info notika-btn-info">Check Employee-->
                                            <!--                                            </button>-->

                                        </div>
                                    </div>
                                </div>
                                <div class="form-example-int form-horizental mg-t-15">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                <label class="hrzn-fm">First Name</label>
                                            </div>
                                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                <div class="nk-int-st">
                                                    <span id="msg2"><b><< NO DATA >></b></span>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-example-int form-horizental mg-t-15">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                <label class="hrzn-fm">Last Name</label>
                                            </div>
                                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                <div class="nk-int-st">
                                                    <span id="msg3"><b><< NO DATA >></b></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-example-int form-horizental mg-t-15">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                <label class="hrzn-fm">Office</label>
                                            </div>
                                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                <div class="nk-int-st">
                                                    <span id="msg4"><b><< NO DATA >></b></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-example-int form-horizental mg-t-15">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                <label class="hrzn-fm">Department</label>
                                            </div>
                                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                <div class="nk-int-st">
                                                    <span id="msg5"><b><< NO DATA >></b></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-example-int form-horizental mg-t-15">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                <label class="hrzn-fm">Designation</label>
                                            </div>
                                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                <div class="nk-int-st">
                                                    <span id="msg6"><b><< NO DATA >></b></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-example-int form-horizental mg-t-15">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                <label class="hrzn-fm">User Role</label>
                                            </div>
                                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                <div class="bootstrap-select fm-cmp-mg">
                                                    <select class="selectpicker" id="role" name="role">

                                                        <?php if ($roles != null) {
                                                            foreach ($roles as $url) {
                                                                ?>
                                                                <option value="<?php echo $url['roleId']; ?>"><?php echo $url['roleType']; ?></option>

                                                            <?php }
                                                        } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-example-int form-horizental mg-t-15">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                <label class="hrzn-fm">Username</label>
                                            </div>
                                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                <div class="nk-int-st">
                                                    <input type="text" id="usrname" name="usrname"
                                                           class="form-control input-sm"
                                                           placeholder="Enter Username" required>
                                                    <span id="result"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-example-int form-horizental mg-t-15">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                <label class="hrzn-fm">Password</label>
                                            </div>
                                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                <div class="nk-int-st">
                                                    <input type="password" id="pwd" name="pwd" style="font-size: 14px;"
                                                           onkeyup="Pwdcheck();" class="form-control input-sm"
                                                           placeholder="Password" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-example-int form-horizental mg-t-15">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                                <label class="hrzn-fm">Retype Password</label>
                                            </div>
                                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                                <div class="nk-int-st">
                                                    <input type="password" id="repwd" name="repwd"
                                                           style="font-size: 14px;"
                                                           onkeyup="Pwdcheck();" class="form-control input-sm"
                                                           placeholder="Retype Password" required>
                                                    <span id="message"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-example-int mg-t-15">
                                    <div class="row">
                                        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        </div>
                                        <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                            <button type="submit" class="btn btn-success notika-btn-success">Submit
                                            </button>
                                            <button type="reset" class="btn btn-danger notika-btn-danger">Reset</button>

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


<!-- End Form area-->


<!-- Start Footer area-->
<?php $this->load->view('includes/footer'); ?>
<!--<End Footer Area >-->

</body>

<!-- Notification Alert JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/notification/bootstrap-growl.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/notification/notify.js"></script>

<!--Ajax function to username Check-->
<script type="text/javascript">
    $(document).ready(function () {
        $('#pwd').click(function () {
            var username = $('#usrname').val();
            $.ajax({
                type: 'POST',
                data: {user: username},
                url: '<?php echo base_url();?>index.php/create_login_controller/usernameValidate',
                success: function (result) {
                    if (result == 1) {
                        document.getElementById('result').style.color = 'red';
                        document.getElementById('result').innerHTML = 'THIS USERNAME IS TAKEN';
                    } else {
                        document.getElementById('result').style.color = 'green';
                        document.getElementById('result').innerHTML = 'THIS USERNAME IS FREE';
                    }

                }
            });
        });
    });

    // Ajax function to UserCgeck
    $(document).ready(function () {
        $('#find').click(function () {
            var employee = $('#empNo').val();
            if (employee != '') {
                $.ajax({
                    type: 'POST',
                    data: {employee: employee},
                    dataType: 'JSON',
                    url: '<?php echo base_url();?>index.php/create_login_controller/empNoValidate',
                    success: function (data) {
                        document.getElementById('msg2').style.color = 'blue';
                        document.getElementById('msg2').style.fontSize = '18px';
                        document.getElementById('msg2').innerHTML = data.fName;

                        document.getElementById('msg3').style.color = 'blue';
                        document.getElementById('msg3').style.fontSize = '18px';
                        document.getElementById('msg3').innerHTML = data.lName;

                        document.getElementById('msg4').style.color = 'blue';
                        document.getElementById('msg4').style.fontSize = '18px';
                        document.getElementById('msg4').innerHTML = data.office;

                        document.getElementById('msg5').style.color = 'blue';
                        document.getElementById('msg5').style.fontSize = '18px';
                        document.getElementById('msg5').innerHTML = data.dept;

                        document.getElementById('msg6').style.color = 'blue';
                        document.getElementById('msg6').style.fontSize = '18px';
                        document.getElementById('msg6').innerHTML = data.desig;

                        // $('#name1').text(data.fName);
                        // $('#fname').html(data.fName);name1
                    }
                });
            } else {

                swal({
                    text: "Please Enter a Valid Employee No",
                    type: "error",

                });

                // document.getElementById('msg1').style.color = 'red';
                // document.getElementById('msg1').innerHTML = 'Please enter a valid Employee No';

            }

        });
    });

    // Javascript function to password Match
    var Pwdcheck = function () {
        if (document.getElementById('pwd').value ==
            document.getElementById('repwd').value) {
            document.getElementById('message').style.color = 'green';
            document.getElementById('message').innerHTML = 'PASSWORD MATCHED';

        } else {
            document.getElementById('message').style.color = 'red';
            document.getElementById('message').innerHTML = 'PASSWORD NOT MATCHED';

        }
    }

</script>
</html>


