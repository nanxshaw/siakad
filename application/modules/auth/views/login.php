<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/assets/images/favicon.ico">
        <!-- App title -->
        <title>Login</title>

        <!-- App css -->
        <link href="<?php echo base_url(); ?>assets/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="<?php echo base_url(); ?>assets/assets/js/modernizr.min.js"></script>

    </head>


    <body class="bg-transparent">

        <!-- HOME -->
        <section>
            <div class="container-alt">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="wrapper-page">

                            <div class="m-t-40 account-pages">
                                <div class="text-center account-logo-box">
                                    <h2 class="text-uppercase" style="color:white;">
                                      Sign In
                                    </h2>
                                    <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
                                </div>
                                <div class="account-content">
                                    <form class="form-horizontal" method="POST" >

                                        <div class="form-group ">
                                            <div class="col-xs-12">
                                                <input class="form-control" name="username" type="text" required="" placeholder="Username">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <input class="form-control" name="password" type="password" required="" placeholder="Password">
                                            </div>
                                        </div>


                                        <div class="form-group account-btn text-center m-t-10">
                                            <div class="col-xs-12">
                                                <button class="btn w-md btn-bordered btn-info waves-effect waves-light" name="login" type="submit">Log In</button>
                                            </div>
                                        </div>

                                    </form>

                                    <div class="clearfix"></div>

                                </div>
                            </div>
                            <!-- end card-box-->


                        </div>
                        <!-- end wrapper -->

                    </div>
                </div>
            </div>
            
					<span class="throw_error"></span>
		<div id="success"></div>
          </section>
          <!-- END HOME -->

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="<?php echo base_url(); ?>assets/assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/assets/js/detect.js"></script>
        <script src="<?php echo base_url(); ?>assets/assets/js/fastclick.js"></script>
        <script src="<?php echo base_url(); ?>assets/assets/js/jquery.blockUI.js"></script>
        <script src="<?php echo base_url(); ?>assets/assets/js/waves.js"></script>
        <script src="<?php echo base_url(); ?>assets/assets/js/jquery.slimscroll.js"></script>
        <script src="<?php echo base_url(); ?>assets/assets/js/jquery.scrollTo.min.js"></script>

        <!-- App js -->
        <script src="<?php echo base_url(); ?>assets/assets/js/jquery.core.js"></script>
        <script src="<?php echo base_url(); ?>assets/assets/js/jquery.app.js"></script>

    </body>
</html>

<script>
$(document).ready(function() {
    $('form').submit(function(event) { 
        var username = $('input[name=username]').val();
        var password = $('input[name=password]').val();
        $.ajax({ 
            type      : 'GET', 
            url       : "<?php echo base_url(); ?>/index.php/auth/login?username="+username+"&password="+password, 
            dataType  : 'json',
            success   : function(data) {
                            if (data.success) {
                                window.location = 'index.php/siswa';
                            }else{
                                alert('Username / Password Anda Salah');
                            }
                        }
        });
        event.preventDefault(); 
    });
});
</script>