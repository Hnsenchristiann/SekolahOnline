<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/font-awesome-4.7.0/css/font-awesome.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/iconic/css/material-design-iconic-font.min.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/main.css');?>">
</head>

<body>
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form"  method="post" action="<?= base_url('auth'); ?>">
                <!-- <span class="login100-form-logo">
						<i class="zmdi zmdi-landscape"></i>
					</span> -->
                <span class="login100-form-title">
                    Log in
                </span>

                <div class="wrap-input100 validate-input" data-validate="Enter Email">
                    <input class="input100" type="text" id="email" name="email" placeholder="Email">
                    <span class="focus-input100" data-placeholder="&#xf207;"></span>
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100" type="password" id="password" name="password" placeholder="Password">
                    <span class="focus-input100" data-placeholder="&#xf191;"></span>
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        Login
                    </button>
                </div>

                <!-- <div class="text-center p-t-90">
						<a class="txt1" href="#">
							Forgot Password?
						</a>
					</div> -->
            </form>
            <div style="color:red; text-align:center; margin-top:10px; ">
                <?= $this->session->flashdata('message'); ?>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url('assets/js/jquery-3.2.1.min.js');?>"></script>
    <script src="<?php echo base_url('assets/js/main.js');?>"></script>

</body>

</html>