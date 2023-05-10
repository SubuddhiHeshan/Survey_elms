<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 5/17/2020
 * Time: 11:23 AM
 */
?>
<!doctype html>

<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!--    <title>Dashboard Three | Notika - Notika Admin Template</title>-->
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <!-- font awesome CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.theme.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.transitions.css">
    <!-- meanmenu CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/meanmenu/meanmenu.min.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/normalize.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- jvectormap CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jvectormap/jquery-jvectormap-2.0.3.css">
    <!-- notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/notika-custom-icon.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/wave/waves.min.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="<?php echo base_url(); ?>assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <!-- dialog CSS
      ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dialog/sweetalert2.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dialog/dialog.css">

    <!-- bootstrap select CSS
            ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-select/bootstrap-select.css">

    <!-- wave CSS
    ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/wave/waves.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/wave/button.css">

    <!-- Data Table JS
    ============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.dataTables.min.css">

</head>
<body style="overflow:auto; position: relative;">

<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->

<!-- Start Header Top Area -->
<!--style="position:fixed; width: 100%; top: 0; z-index:5;"-->
<div class="header-top-area" id="myHeader2" style="position:fixed; width: 100%; top: 0; z-index: 10;">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="logo-area">
                    <a href="#"><img src="<?php echo base_url(); ?>assets/img/logo/survey_elms_logo.png" alt=""/></a>


                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="header-top-menu">
                    <ul class="nav navbar-nav notika-top-nav">


                        <!--                        <li class="nav-item dropdown">-->
                        <!--                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span><i class="notika-icon notika-search"></i></span></a>-->
                        <!--                            <div role="menu" class="dropdown-menu search-dd animated flipInX">-->
                        <!--                                <div class="search-input">-->
                        <!--                                    <i class="notika-icon notika-left-arrow"></i>-->
                        <!--                                    <input type="text" />-->
                        <!--                                </div>-->
                        <!--                            </div>-->
                        <!--                        </li>-->


                        <li class="nav-item">
                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false"
                               class="nav-link dropdown-toggle">
                                <span>
<i class="fa fa-user fa-2x"></i>
                                </span>
                            </a>
                            <div role="menu" class="dropdown-menu message-dd task-dd animated zoomIn">

                                <div class="hd-mg-tt">
                                    <h2 style="color: darkred; text-transform: uppercase;" align="left">
                                        Welcome <?php echo $_SESSION['fname']; ?></h2>
                                </div>
                                <div class="hd-message-info">
                                    <a href="<?php echo base_url(); ?>index.php/profile_controller/profileView">
                                        <div class="hd-message-sn">
                                            <!--                                            <div class="hd-message-img">-->
                                            <!--                                                <img src="-->
                                            <?php //echo base_url();?><!--assets/img/post/1.jpg" alt="" />-->
                                            <!--                                            </div>-->
                                            <div class="hd-mg-ctn">
                                                <h3 align="center">View your Profile</h3>
                                            </div>

                                            <button class="btn btn-success success-icon-notika btn-reco-mg btn-button-mg">
                                                <i class="notika-icon notika-right-arrow"></i></button>

                                        </div>
                                    </a>
                                    <a href="<?php echo base_url(); ?>index.php/profile_controller/editProfileView">
                                        <div class="hd-message-sn">
                                            <!--                                            <div class="hd-message-img">-->
                                            <!--                                                <img src="img/post/2.jpg" alt="" />-->
                                            <!--                                            </div>-->
                                            <div class="hd-mg-ctn">
                                                <h3 align="center">Edit your profile</h3>
                                                <!--                                                <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>-->
                                            </div>

                                            <button class="btn btn-success success-icon-notika btn-reco-mg btn-button-mg">
                                                <i class="notika-icon notika-refresh"></i></button>

                                        </div>
                                    </a>

                                    <a href="<?php echo base_url(); ?>index.php/auth_controller/logout">
                                        <div class="hd-message-sn">
                                            <!--                                            <div class="hd-message-img">-->
                                            <!--                                                <img src="img/post/2.jpg" alt="" />-->
                                            <!--                                            </div>-->
                                            <div class="hd-mg-ctn">
                                                <h3 align="center">Sign Out</h3>
                                                <!--                                                <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>-->
                                            </div>

                                            <button class="btn btn-success success-icon-notika btn-reco-mg btn-button-mg">
                                                <i class="notika-icon notika-next"></i></button>

                                        </div>
                                    </a>
                                </div>
                        </li>


                        <!--                                //////////////////////////////////-->
                        <!--                                Logged as a Admin-->
                        <?php if ($_SESSION['user_role'] == 1) { ?>

                            <li class="nav-item nc-al"><a href="#" data-toggle="dropdown" role="button"
                                                          aria-expanded="false"
                                                          class="nav-link dropdown-toggle">
                                    <span>
<!--                                        <i class="notika-icon notika-alarm"></i>-->
                                        <i class="fa fa-bell fa-2x" aria-hidden="true"></i>
                                    </span>

                                </a>
                                <div role="menu" class="dropdown-menu message-dd notification-dd animated zoomIn">
                                    <div class="hd-mg-tt">
                                        <h2>Notifications</h2>
                                    </div>
                                    <?php $count = 1; ?>
                                    <?php if ($unread != null) { ?>
                                        <?php foreach ($unread as $unl) { ?>


                                            <div class="hd-message-info">
                                                <a href="<?php echo base_url(); ?>index.php/leave_mgt_control/leave_dtl_controller/detailsView?leaveid=<?php echo $unl['id']; ?>&read=1">
                                                    <div class="hd-message-sn">
                                                        <!--                                            <div class="hd-message-img">-->
                                                        <!--                                                <i class="fa fa-plus-circle fa-2x"></i>-->
                                                        <!--                                            </div>-->

                                                        <div class="hd-mg-ctn">
                                                            <h3><?php echo $unl['fName'] . " " . $unl['lName'] ?>
                                                                (<?php echo $unl['empNo']; ?>)
                                                            </h3>
                                                            <p>Applied for leave</p>
                                                            <span>at <?php echo date('Y-m-d', strtotime($unl['applyDate'])) ?></span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <?php $count++;
                                        }
                                    } ?>

                                    <div class="hd-mg-va">
                                        <?php if ($unread != null) { ?>
                                            <a href="<?php echo base_url(); ?>index.php/leave_mgt_control/pending_leave_controller/pendingLeavesView">View
                                                All</a>

                                        <?php } ?>
                                    </div>
                                </div>
                            </li>

                            <li class="nav-item">
                                <?php if ($lvCount != 0) { ?>
                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false"
                                       class="nav-link dropdown-toggle"><span>
<!--                                    <i class="notika-icon notika-chat"></i></span>-->
                                <div class="spinner4 spinner-4"></div>
                                <div class="ntd-ctn"><span><?php echo $lvCount; ?></span></div>

                                    </a>
                                <?php } ?>

                                <!--                            <div role="menu" class="dropdown-menu message-dd chat-dd animated zoomIn">-->
                                <!--                                <div class="hd-mg-tt">-->
                                <!--                                    <h2>Chat</h2>-->
                                <!--                                </div>-->
                                <!--                                <div class="search-people">-->
                                <!--                                    <i class="notika-icon notika-left-arrow"></i>-->
                                <!--                                    <input type="text" placeholder="Search People"/>-->
                                <!--                                </div>-->
                                <!--                                <div class="hd-message-info">-->
                                <!--                                    <a href="#">-->
                                <!--                                        <div class="hd-message-sn">-->
                                <!--                                            <div class="hd-message-img chat-img">-->
                                <!--                                                <img src="img/post/1.jpg" alt=""/>-->
                                <!--                                                <div class="chat-avaible"><i class="notika-icon notika-dot"></i></div>-->
                                <!--                                            </div>-->
                                <!--                                            <div class="hd-mg-ctn">-->
                                <!--                                                <h3>David Belle</h3>-->
                                <!--                                                <p>Available</p>-->
                                <!--                                            </div>-->
                                <!--                                        </div>-->
                                <!--                                    </a>-->
                                <!--                                    <a href="#">-->
                                <!--                                        <div class="hd-message-sn">-->
                                <!--                                            <div class="hd-message-img chat-img">-->
                                <!--                                                <img src="img/post/2.jpg" alt=""/>-->
                                <!--                                            </div>-->
                                <!--                                            <div class="hd-mg-ctn">-->
                                <!--                                                <h3>Jonathan Morris</h3>-->
                                <!--                                                <p>Last seen 3 hours ago</p>-->
                                <!--                                            </div>-->
                                <!--                                        </div>-->
                                <!--                                    </a>-->
                                <!--                                    <a href="#">-->
                                <!--                                        <div class="hd-message-sn">-->
                                <!--                                            <div class="hd-message-img chat-img">-->
                                <!--                                                <img src="img/post/4.jpg" alt=""/>-->
                                <!--                                            </div>-->
                                <!--                                            <div class="hd-mg-ctn">-->
                                <!--                                                <h3>Fredric Mitchell</h3>-->
                                <!--                                                <p>Last seen 2 minutes ago</p>-->
                                <!--                                            </div>-->
                                <!--                                        </div>-->
                                <!--                                    </a>-->
                                <!--                                    <a href="#">-->
                                <!--                                        <div class="hd-message-sn">-->
                                <!--                                            <div class="hd-message-img chat-img">-->
                                <!--                                                <img src="img/post/1.jpg" alt=""/>-->
                                <!--                                                <div class="chat-avaible"><i class="notika-icon notika-dot"></i></div>-->
                                <!--                                            </div>-->
                                <!--                                            <div class="hd-mg-ctn">-->
                                <!--                                                <h3>David Belle</h3>-->
                                <!--                                                <p>Available</p>-->
                                <!--                                            </div>-->
                                <!--                                        </div>-->
                                <!--                                    </a>-->
                                <!--                                    <a href="#">-->
                                <!--                                        <div class="hd-message-sn">-->
                                <!--                                            <div class="hd-message-img chat-img">-->
                                <!--                                                <img src="img/post/2.jpg" alt=""/>-->
                                <!--                                                <div class="chat-avaible"><i class="notika-icon notika-dot"></i></div>-->
                                <!--                                            </div>-->
                                <!--                                            <div class="hd-mg-ctn">-->
                                <!--                                                <h3>Glenn Jecobs</h3>-->
                                <!--                                                <p>Available</p>-->
                                <!--                                            </div>-->
                                <!--                                        </div>-->
                                <!--                                    </a>-->
                                <!--                                </div>-->
                                <!--                                <div class="hd-mg-va">-->
                                <!--                                    <a href="#">View All</a>-->
                                <!--                                </div>-->
                                <!--                            </div>-->
                            </li>


                            <!--                            Logged as a Leave Officer-->
                        <?php } elseif ($_SESSION['user_role'] == 2) { ?>

                            <!--                            Logged as a User-->
                        <?php } elseif ($_SESSION['user_role'] == 3) { ?>
                            <li class="nav-item nc-al"><a href="#" data-toggle="dropdown" role="button"
                                                          aria-expanded="false"
                                                          class="nav-link dropdown-toggle">
                                    <span>
                                        <i class="fa fa-bell fa-2x" aria-hidden="true"></i>
                                    </span>

                                </a>
                                <div role="menu" class="dropdown-menu message-dd notification-dd animated zoomIn">
                                    <div class="hd-mg-tt">
                                        <h2>Notifications</h2>
                                    </div>
                                    <?php $count = 1; ?>
                                    <?php if ($WprntLvs != null) { ?>
                                        <?php foreach ($WprntLvs as $prntl) { ?>


                                            <div class="hd-message-info">
                                                <a href="<?php echo base_url(); ?>index.php/print_lev_dtls_controller/printLevDtls?leaveId=<?php echo $prntl['id']; ?>&print=1"
                                                   target="_blank">
                                                    <div class="hd-message-sn">
                                                        <div class="hd-mg-ctn">
                                                            <h3><?php echo $prntl['fName'] . " " . $prntl['lName'] ?>
                                                                (<?php echo $prntl['empNo']; ?>)
                                                            </h3>
                                                            <p>Approved your leave</p>
                                                            <span>at <?php echo date('Y-m-d', strtotime($prntl['adminRemarkDate'])) ?></span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <?php $count++;
                                        }
                                    } ?>

                                    <div class="hd-mg-va">
                                        <?php if ($WprntLvs != null) { ?>
                                            <a href="<?php echo base_url(); ?>index.php/print_leave_controller/printLeaveView">View
                                                All</a>

                                        <?php } ?>
                                    </div>
                                </div>
                            </li>

                            <li class="nav-item">
                                <?php if ($prntCount != 0) { ?>
                                    <a href="#" data-toggle="dropdown" role="button" aria-expanded="false"
                                       class="nav-link dropdown-toggle"><span>
                                <div class="spinner4 spinner-4"></div>
                                <div class="ntd-ctn"><span><?php echo $prntCount; ?></span></div>

                                    </a>
                                <?php } ?>
                            </li>

                            <!--                            Logged as a Super Admin-->
                        <?php } elseif ($_SESSION['user_role'] == 4) { ?>

                            <h1>Super Admin</h1>

                        <?php } ?>


                        <!--                                //////////////////-->


                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Header Top Area -->

</body>
</html>
