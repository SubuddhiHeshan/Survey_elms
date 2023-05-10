<?php

//error_reporting(0);
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 6/7/2020
 * Time: 1:13 PM
 */
?>
<!doctype html>


<head>
    <title>Edit Profile | Survey - Elms</title>
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">

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
            <form name="updateEmployee" method="post"
                  action="<?php echo base_url(); ?>index.php/profile_controller/updateProfile">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-element-list">
                        <div class="cmp-tb-hd">
                            <h2>Edit Your Persoanl Informations</h2>
                            <p style="color: red;">You have limited access to edit your profile. Some fields are
                                restricted
                                to your User Role </p>
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
                                        <input type="text" class="form-control" name="fname"
                                               value="<?php echo $regData->fName; ?>"
                                               placeholder="First Name" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-support"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" name="mname" class="form-control"
                                               value="<?php echo $regData->mName; ?>"
                                               placeholder="Middle Name" required>
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
                                               value="<?php echo $regData->lName; ?>"
                                               placeholder="Last Name" required>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-next"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="number" name="empno" value="<?php echo $_SESSION['emp']; ?>"
                                               class="form-control"
                                               placeholder="Employee No" required readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-edit"></i>
                                    </div>
                                    <div class="bootstrap-select fm-cmp-mg">
                                        <select class="selectpicker" name="desg" data-live-search="true" readonly>
                                            <option value="<?php echo $_SESSION['deg']; ?>">
                                                <b><?php echo $regData->dName; ?>
                                            </option>
                                            </b></option>
                                            <!--                                            --><?php //$cnt = 1; ?>
                                            <!--                                            --><?php //foreach ($designations as $deg) { ?>
                                            <!--                                                <option value="-->
                                            <?php //echo $deg['dId'] ?><!--">-->
                                            <?php //echo $deg['dName'] ?><!--</option>-->
                                            <!--                                                --><?php //$cnt++;
                                            //                                            } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-mail"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="email" name="email" value="<?php echo $regData->email; ?>"
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
                                        <input type="number" name="tele" value="<?php echo $regData->tele; ?>"
                                               class="form-control"
                                               placeholder="Contact Number" required maxlength="10">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-map"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" name="add1" value="<?php echo $regData->address1; ?>"
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
                                               value="<?php echo $regData->address2; ?>"
                                               placeholder="Address Line 2" required>
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
                                            <option value="<?php echo $regData->userCarder; ?>"><?php echo $regData->userCarder; ?></option>

                                            <!--                                            --><?php //if ($regData->userCarder == 'Permanent') { ?>
                                            <!--                                                <option vlaue="Trainee">Trainee</option>-->
                                            <!---->
                                            <!--                                            --><?php //} elseif ($regData->userCarder == 'Trainee') { ?>
                                            <!--                                                <option vlaue="Permanent">Permanent</option>-->
                                            <!---->
                                            <!--                                            --><?php //} ?>

                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-star"></i>
                                    </div>
                                    <div class="bootstrap-select fm-cmp-mg">
                                        <select class="selectpicker" name="role" required>
                                            <option value="<?php echo $_SESSION['user_role']; ?>"> <?php echo $logRole->roleType; ?>
                                            </option>
                                            <!--                                            --><?php //$count2 = 1; ?>
                                            <!--                                            --><?php //foreach ($uroles as $roles) { ?>
                                            <!--                                                <option value="-->
                                            <?php //echo $roles['roleId'] ?><!--">-->
                                            <?php //echo $roles['roleType']; ?><!--</option>-->
                                            <!--                                                --><?php //$count2++;
                                            //                                            } ?>
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
                                            <option value="<?php echo $_SESSION['ofz']; ?>">
                                                <?php echo $regData->ofzName; ?></option>
                                            <!--                                            --><?php //foreach ($office as $ofz) { ?>
                                            <!--                                                <option value="-->
                                            <?php //echo $ofz['ofzId']; ?><!--">-->
                                            <?php //echo $ofz['ofzName']; ?><!--</option>-->
                                            <!--                                            --><?php //} ?>

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
                                        <select class="selectpicker" name="dept" data-live-search="true">
                                            <option value="<?php echo $_SESSION['dept']; ?>">
                                                <?php echo $regData->deptName; ?></option>
                                            <!--                                            --><?php //foreach ($department as $dept) { ?>
                                            <!--                                                <option value="-->
                                            <?php //echo $dept['deptId']; ?><!--">-->
                                            <?php //echo $dept['deptName']; ?><!--</option>-->
                                            <!---->
                                            <!--                                            --><?php //} ?>

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-star"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" name="username" value="<?php echo $_SESSION['user']; ?>"
                                               class="form-control"
                                               placeholder="Username" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="dialog-pro dialog">
                                    <button style="margin-left: 80%;" type="submit" class="btn btn-info">
                                        Update
                                    </button>
                                </div>
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


</html>