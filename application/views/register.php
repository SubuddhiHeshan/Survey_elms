<?php
//error_reporting(0);
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 1/27/2021
 * Time: 11:25 PM
 */
?>
<!doctype html>


<head>
    <title>Register Employee | Survey - Elms</title>
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">

    <!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">-->

    <style type="text/css">
        input[type="checkbox"] {
            height: 20px;
            width: 20px;
            background-color: #d5d5d5;
            background-radius: 5px;
            cursor: pointer;
        }

        input[type="radio"] {
            height: 20px;
            width: 20px;
            background-color: #d5d5d5;
            background-radius: 5px;
            cursor: pointer;
        }

        input[type="radio"]:checked {
            background-color: #5bcd3e;
        }

        input[type="radio"]:checked:after {
            display: block;
        }

        lable {
            display: inline;
            margin: 0.2em;
            font-size: 18px;
            color: gray;
        }

        /*input[type=checkbox] {*/
        /*!*display: none;*!*/
        /*}*/

        /*input[type=checkbox] + lable :before {*/
        /*content: "\2714";*/
        /*border: 0.1em solid #000;*/
        /*border-radius: 0.2em;*/
        /*display: inline-block;*/
        /*width: 1em;*/
        /*height:1em;*/
        /*padding-left:0.2em;*/
        /*padding-bottom:0.3em;*/
        /*margin-right:0.2em;*/
        /*vertical-align: bottom;*/

        /*}*/

        input[type="checkbox"]:checked {
            background-color: #5bcd3e;
        }

        input[type="checkbox"]:checked:after {
            display: block;
        }

    </style>

</head>

<body style="padding-top: 250px; padding-bottom: 100px; z-index: 5;">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Invoice Print Area Start -->
<!--<div class="invoice-print">-->
<!--    <a href="#" class="btn" data-ma-action="print"><i class="notika-icon notika-print"></i></a>-->
<!--</div>-->
<!-- Invoice Print Area End -->
<!-- Start Header Top Area -->
<?php $this->load->view('includes/header'); ?>
<!-- End Header Top Area -->


<?php $this->load->view('includes/navigation'); ?>

<!--edit profile view start-->
<!-- Form Element area Start-->
<div class="form-element-area">
    <div class="container">


        <div class="row">
            <form name="createEmployee" method="post"
                  action="<?php echo base_url(); ?>index.php/register_controller/createEmployee">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-element-list">
                        <div class="cmp-tb-hd">
                            <h2>Register Employee</h2>
                        </div>
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
                                                aria-hidden="true"><i class="notika-icon notika-close"></i></span>
                                    </button>
                                    <a href="" class="alert-link"><?php echo $_SESSION['error']; ?></a></div>

                                <?php
                            } ?>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-support"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" class="form-control" name="fname" id="fname"
                                               value=""
                                               placeholder="First Name" required onkeyup="validate1()">
                                        <span id="test1"></span>

                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-support"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" name="mname" class="form-control" id="mname"
                                               value=""
                                               placeholder="Middle Name" onkeyup="validate2()">
                                        <span id="test2"></span>

                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-support"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" name="lname" class="form-control"
                                               value=""
                                               placeholder="Last Name" onkeyup="validate3()">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-support"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <lable>Male</lable>
                                        <input type="radio" value="Male" name="gender" class="i-checks" required>&nbsp;&nbsp;
                                        <i></i>
                                        <lable>Female</lable>
                                        <input type="radio" value="Female" name="gender" class="i-checks">
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-next"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="number" name="empno" value="" id="emp"
                                               class="form-control"
                                               placeholder="Employee No" onkeyup="validate3()" required>
                                        <span id="test3"></span>

                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-edit"></i>
                                    </div>
                                    <div class="bootstrap-select fm-cmp-mg">
                                        <select class="selectpicker" name="desg" data-live-search="true" id="desg"
                                                required>
                                            <option value=""><b>Select Designation</b></option>
                                            <?php $cnt = 1; ?>
                                            <?php foreach ($designation as $deg) { ?>
                                                <option value="<?php echo $deg['dId'] ?>"><?php echo $deg['dName'] ?></option>
                                                <?php $cnt++;
                                            } ?>
                                        </select>
                                        <span id="test4"></span>

                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-mail"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="email" name="email" value=""
                                               class="form-control"
                                               placeholder="Email Address">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-phone"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="number" name="tele" value=""
                                               class="form-control"
                                               placeholder="Contact Number" maxlength="10" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-map"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" name="add1" value=""
                                               class="form-control"
                                               placeholder="Address Line 1" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-map"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" name="add2" class="form-control"
                                               value=""
                                               placeholder="Address Line 2">
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-star"></i>
                                    </div>
                                    <div class="bootstrap-select fm-cmp-mg">
                                        <select name="ucarder" class="selectpicker" required>
                                            <option value="">Select Employee Carder</option>
                                            <option value="Permanent">Permanent</option>
                                            <option value="Probation">Probation</option>
                                            <option value="Trainee">Trainee</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-house"></i>
                                    </div>
                                    <div class="bootstrap-select fm-cmp-mg">
                                        <select class="selectpicker" name="office" data-live-search="true" required>
                                            <option value=""><b>Select Office</b></option>
                                            <?php $count3 = 1; ?>
                                            <?php foreach ($offices as $ofz) { ?>
                                                <option value="<?php echo $ofz['ofzId']; ?>"><?php echo $ofz['ofzName']; ?></option>
                                                <?php $count3++; ?>
                                            <?php } ?>

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-house"></i>
                                    </div>
                                    <div class="bootstrap-select fm-cmp-mg">
                                        <select class="selectpicker" name="dept" data-live-search="true" required>
                                            <option value=""><b>Select Department</b></option>
                                            <?php $count4 = 1; ?>
                                            <?php foreach ($departments as $dept) { ?>
                                                <option value="<?php echo $dept['deptId']; ?>"><?php echo $dept['deptName']; ?></option>

                                                <?php $count4++;
                                            } ?>

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-star"></i>
                                    </div>
                                    <h5>Select Leave Eligibility</h5>
                                    <?php $count5 = 1; ?>
                                    <?php foreach ($leaves as $lve) { ?>
                                        <!--                                        <ul>-->
                                        <!--                                            <li>-->
                                        &nbsp;<label><input type="checkbox" name="leaves[]"
                                                            value="<?php echo $lve['levId']; ?>"
                                                            checked=""
                                                            class="i-checks"></label>&nbsp;
                                        <lable><?php echo $lve['levName']; ?></lable>
                                        <!---->
                                        <!--                                            </li>-->
                                        <!--                                        </ul>-->
                                        <?php $count5++;
                                    } ?>

                                </div>
                            </div>

                            <!--                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">-->
                            <!--                                <div class="form-group ic-cmp-int">-->
                            <!--                                    <div class="form-ic-cmp">-->
                            <!--                                        <i class="notika-icon notika-star"></i>-->
                            <!--                                    </div>-->
                            <!--                                    <div class="bootstrap-select fm-cmp-mg">-->
                            <!--                                        <select class="selectpicker" name="role" required>-->
                            <!--                                            <option value=""><b>Select User Role</b></option>-->
                            <!--                                            --><?php //$count2 = 1; ?>
                            <!--                                            --><?php //foreach ($usRoles as $roles) { ?>
                            <!--                                                <option value="-->
                            <?php //echo $roles['roleId'] ?><!--">--><?php //echo $roles['roleType']; ?><!--</option>-->
                            <!--                                                --><?php //$count2++;
                            //                                            } ?>
                            <!--                                        </select>-->
                            <!--                                    </div>-->
                            <!--                                </div>-->
                            <!--                            </div>-->


                            <!--                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">-->
                            <!--                                <div class="form-group ic-cmp-int">-->
                            <!--                                    <div class="form-ic-cmp">-->
                            <!--                                        <i class="notika-icon notika-star"></i>-->
                            <!--                                    </div>-->
                            <!--                                    <div class="nk-int-st">-->
                            <!--                                        <input type="text" name="username" value=""-->
                            <!--                                               class="form-control"-->
                            <!--                                               placeholder="Username" required onkeyup="validateu()">-->
                            <!--                                        <span id="test"</span>-->
                            <!--                                    </div>-->
                            <!--                                </div>-->
                            <!--                            </div>-->

                            <!--                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">-->
                            <!--                                <div class="form-group ic-cmp-int">-->
                            <!--                                    <div class="form-ic-cmp">-->
                            <!--                                        <i class="notika-icon notika-star"></i>-->
                            <!--                                    </div>-->
                            <!--                                    <div class="nk-int-st">-->
                            <!--                                        <input type="password" id="new_password" onkeyup="check();" name="pwd" value=""-->
                            <!--                                               onclick="validatep()"-->
                            <!--                                               class="form-control"-->
                            <!--                                               placeholder="Password" required>-->
                            <!--                                        <span id="testp"></span>-->
                            <!--                                    </div>-->
                            <!--                                </div>-->
                            <!--                            </div>-->

                            <!--                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">-->
                            <!--                                <div class="form-group ic-cmp-int">-->
                            <!--                                    <div class="form-ic-cmp">-->
                            <!--                                        <i class="notika-icon notika-star"></i>-->
                            <!--                                    </div>-->
                            <!--                                    <div class="nk-int-st">-->
                            <!--                                        <input type="password" id="confirm_password" onkeyup="check();" name="repwd"-->
                            <!--                                               value=""-->
                            <!--                                               class="form-control"-->
                            <!--                                               placeholder="Retype Password" required>-->
                            <!--                                        <span id="message"></span>-->
                            <!---->
                            <!--                                    </div>-->
                            <!--                                </div>-->
                            <!--                            </div>-->

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <button type="submit" class="btn btn-success notika-btn-success text-right"
                                        style="margin-left: 950px; color: #2cc36b;"><b style="color: white;">Submit</b>
                                </button>
                                <button type="reset" class="btn btn-danger notika-btn-danger"><b style="color: white;">Reset</b>
                                </button>
                            </div>


                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--edit profilr view end-->

    <!-- Start Footer area-->
    <?php $this->load->view('includes/footer'); ?>
    <!-- End Footer area-->


</body>

<!-- Notification Alert JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/notification/bootstrap-growl.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/notification/notify.js"></script>


<script type="text/javascript">

    var check = function () {
        if (document.getElementById('new_password').value ==
            document.getElementById('confirm_password').value) {
            document.getElementById('message').style.color = 'green';
            document.getElementById('message').innerHTML = 'PASSWORD MATCHED';

        } else {
            document.getElementById('message').style.color = 'red';
            document.getElementById('message').innerHTML = 'PASSWORD NOT MATCHED';

        }
    }
    // //test ui
    // var validate1 = function () {
    //
    //         document.getElementById('test1').style.color = 'red';
    //         document.getElementById('test1').innerHTML = 'Please Select a valid leave type';
    //
    //
    // }
    // var validatep = function () {
    //
    //     document.getElementById('testp').style.color = 'red';
    //     document.getElementById('testp').innerHTML = 'The password field must be at least 8 characters';
    //
    //
    //
    //
    // }
    //
    // var validate3 = function () {
    //
    //     document.getElementById('test3').style.color = 'green';
    //     document.getElementById('test3').innerHTML = 'Employee Number found in the system';
    //
    //
    //
    //
    // }
    //
    // var validate4 = function () {
    //
    //     document.getElementById('test4').style.color = 'red';
    //     document.getElementById('test4').innerHTML = 'Please Select a Designation';
    //
    // }

</script>

</html>