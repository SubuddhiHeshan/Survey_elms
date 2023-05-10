<?php
/**
 * Created by PhpStorm.
 * User: MDS Heshan
 * Date: 9/9/2020
 * Time: 7:49 PM
 */
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <!-- favicon
    ============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">

    <meta name="viewreport" content="width=device-width, initial-scal=1">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/custom.css">
    <!--    <link href="https://fonts.gooleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">-->
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>

    <!-- font awesome CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">

    <style type="text/css">
        .alert {
            padding: 10px;
            color: #D8000C;
            background-color: #FFBABA;
            text-align: center;
        }

        .closebtn {
            margin-left: 15px;
            color: #D8000C;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        .closebtn:hover {
            color: black;
        }

    </style>

</head>

<body>
<!--    <img class="wave" src="--><?php //echo base_url(); ?><!--assets/img/welcome/ff.jpg">-->
<div class="container">
    <div class="img">
        <img src="<?php echo base_url(); ?>assets/img/welcome/img.svg">
    </div>
    <div class="login-container">
        <form name="signin" method="post" action="<?php echo base_url(); ?>index.php/auth_controller/userLogin">

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

                <!--                <div class="alert alert-danger alert-dismissible alert-mg-b-0" role="alert">-->
                <!--                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span-->
                <!--                                aria-hidden="true"><i class="notika-icon notika-close"></i></span></button>-->
                <!--                    <a href="" class="alert-link">--><?php //echo $_SESSION['error']; ?><!--</a></div>-->

                <div class="alert">
                    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    <?php echo $_SESSION['error']; ?>
                </div>


                <?php
            } ?>

            <img class="avatar" src="<?php echo base_url(); ?>assets/img/welcome/avatar.svg">
            <h2>Welcome To Survey Leave Management System</h2>
            <div class="input-div one">
                <div class="i">
                    <i class="fas fa-user"></i>
                </div>
                <div>
                    <!--                        <h5>Username</h5>-->
                    <input class="input" type="text" id="username" placeholder="Username" name="username" required>

                </div>
            </div>

            <div class="input-div two">
                <div class="i">
                    <i class="fas fa-lock"></i>
                </div>
                <div>
                    <!--                        <h5>Password</h5>-->
                    <input class="input" type="password" placeholder="Password" name="password" required>

                </div>
            </div>
            <a href="">Forgot Password?</a>
            <input type="submit" class="btn" value="Login">
        </form>
    </div>
</div>

</body>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/custom.js"></script>


</html>
