<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 5/17/2020
 * Time: 11:51 AM
 */
?>

<!doctype html>


<head>
    <title>Profile | Survey - Elms</title>
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

<!-- Profile View Start-->
<div class="invoice-area">
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

                <div class="invoice-wrap">
                    <div class="invoice-img">
                        <!--                        <h2>Survey Department Sri Lanka</h2>-->
                        <!--                        <h3>User Profile</h3>-->
                        <img src="<?php echo base_url(); ?>assets/img/logo/banner.png" alt=""/>
                    </div>
                    <div class="invoice-hds-pro">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="invoice-cmp-ds ivc-frm">
                                    <div class="invoice-frm">
                                        <span>Employee No</span>
                                    </div>
                                    <div class="comp-tl">
                                        <h2>Name</h2>
                                        <p>Address</p>
                                    </div>
                                    <div class="cmp-ph-em">
                                        <span>Office</span>
                                        <span>Department</span>
                                    </div>
                                    <div class="cmp-ph-em">
                                        <span>Designation</span>
                                        <span>User Type</span>
                                    </div>
                                    <div class="comp-tl">
                                        <h2>Contact No</h2>
                                        <span>Email</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="invoice-cmp-ds ivc-to">
                                    <div class="invoice-frm">
                                        <span><?php echo $_SESSION['emp']; ?></span>
                                    </div>
                                    <div class="comp-tl">
                                        <h2><?php echo $profile->fName . ' ' . $profile->mName . ' ' . $profile->lName; ?></h2>
                                        <p><?php echo $profile->address1 . ' ' . $profile->address2; ?></p>
                                    </div>
                                    <div class="cmp-ph-em">
                                        <span><?php echo $profile->ofzName; ?></span>
                                        <span><?php echo $profile->deptName; ?></span>
                                    </div>
                                    <div class="cmp-ph-em">
                                        <span><?php echo $profile->dName; ?></span>
                                        <span><?php echo $profile->userCarder; ?></span>
                                    </div>
                                    <div class="comp-tl">
                                        <h2><?php echo $profile->tele; ?></h2>
                                        <p><?php echo $profile->email; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--                    <div class="row">-->
                    <!--                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">-->
                    <!--                            <div class="invoice-hs">-->
                    <!--                                <span>Invoice#</span>-->
                    <!--                                <h2>456656</h2>-->
                    <!--                            </div>-->
                    <!--                        </div>-->
                    <!--                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">-->
                    <!--                            <div class="invoice-hs date-inv sm-res-mg-t-30 tb-res-mg-t-30 tb-res-mg-t-0">-->
                    <!--                                <span>Date</span>-->
                    <!--                                <h2>20/03/2018</h2>-->
                    <!--                            </div>-->
                    <!--                        </div>-->
                    <!--                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">-->
                    <!--                            <div class="invoice-hs wt-inv sm-res-mg-t-30 tb-res-mg-t-30 tb-res-mg-t-0">-->
                    <!--                                <span>Whatever</span>-->
                    <!--                                <h2>472-000</h2>-->
                    <!--                            </div>-->
                    <!--                        </div>-->
                    <!--                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">-->
                    <!--                            <div class="invoice-hs gdt-inv sm-res-mg-t-30 tb-res-mg-t-30 tb-res-mg-t-0">-->
                    <!--                                <span>Grand Total</span>-->
                    <!--                                <h2>$25,980</h2>-->
                    <!--                            </div>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="invoice-sp">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Username</th>
                                        <th>User Role</th>
                                        <th>Register Date</th>
                                        <th>Lock Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $count = 1; ?>

                                    <?php foreach ($usernames as $logins) { ?>


                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td><?php echo $logins['username']; ?></td>
                                            <td><?php echo $logins['roleType']; ?></td>


                                            <td><?php echo $profile->createDate; ?></td>
                                            <?php if ($logins['lockStatus'] == 1) { ?>

                                                <td style="color: green" ;>Account is Active</td>

                                            <?php } else { ?>
                                                <td style="color: red" ;>Account is Inactive</td>
                                            <?php } ?>
                                        </tr>

                                        <?php $count++;
                                    } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--                    <div class="row">-->
                    <!--                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">-->
                    <!--                            <div class="invoice-ds-int">-->
                    <!--                                <h2>Remarks</h2>-->
                    <!--                                <p>Ornare non tortor. Nam quis ipsum vitae dolor porttitor interdum. Curabitur faucibus erat vel ante fermentum lacinia. Integer porttitor laoreet suscipit. Sed cursus cursus massa ut pellentesque. Phasellus vehicula dictum arcu, eu interdum massa bibendum. Ornare non tortor. Nam quis ipsum vitae dolor porttitor interdum. Curabitur faucibus erat vel ante fermentum lacinia. Integer porttitor laoreet suscipit. Sed cursus cursus massa ut pellentesque. Phasellus vehicula dictum arcu, eu interdum massa bibendum. </p>-->
                    <!--                            </div>-->
                    <!--                            <div class="invoice-ds-int invoice-last">-->
                    <!--                                <h2>Notika For Your Business</h2>-->
                    <!--                                <p class="tab-mg-b-0">Ornare non tortor. Nam quis ipsum vitae dolor porttitor interdum. Curabitur faucibus erat vel ante fermentum lacinia. Integer porttitor laoreet suscipit. Sed cursus cursus massa ut pellentesque. Phasellus vehicula dictum arcu, eu interdum massa bibendum. Ornare non tortor. Nam quis ipsum vitae dolor porttitor interdum. Curabitur faucibus erat vel ante fermentum lacinia. Integer porttitor laoreet suscipit. Sed cursus cursus massa ut pellentesque. Phasellus vehicula dictum arcu, eu interdum massa bibendum. </p>-->
                    <!--                            </div>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Profile View End-->
<!-- Start Footer area-->
<?php $this->load->view('includes/footer'); ?>
<!-- End Footer area-->

</body>

<!-- Notification Alert JS
    ============================================ -->
<script src="<?php echo base_url(); ?>assets/js/notification/bootstrap-growl.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/notification/notify.js"></script>


</html>