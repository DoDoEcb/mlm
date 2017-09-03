<!DOCTYPE html>

<html>

    <head>
        <title> Log in</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />
        <!-- Bootstrap 3.3.2 -->

        <link href="<?= base_url("content/theme/bootstrap/css/bootstrap.min.css"); ?>" rel="stylesheet" />

        <link href="<?= base_url("content/theme/offline/css/font-awesome.min.css"); ?>" rel="stylesheet" /> 
        <link href="<?= base_url("content/theme/offline/css/font-awesome.css"); ?>" rel="stylesheet" /> 
        <link href="<?= base_url("content/theme/offline/ionicons.min.css"); ?>" rel="stylesheet" />

        <!-- Theme style -->
        <link href="<?= base_url("content/theme/dist/css/AdminLTE.min.css"); ?>" rel="stylesheet" type="text/css"/> 
        <!-- iCheck -->
        <link href="<?= base_url("content/theme/plugins/iCheck/square/blue.css"); ?>" rel="stylesheet" type="text/css" />
      <style>
        select {
            width: 100%;
        }

        button {
            background-color: #CCA466 !important;
            color: #ffffff;
        }

            button:hover {
                color: #ffffff !important;
            }
    </style>
    </head>

    <body class="login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href=""><b>My PHP CI</b></a>
            </div><!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Register New</p>
                <form action="registernew" id="frmLogin" method="post">
                    <div class="form-group has-feedback">
                        <input type="hidden" name="btnRegister" />
                        <input type="text" class="form-control" name="username" placeholder="Username" />
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div> 
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" name="password" placeholder="Password" />
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                     <div class="form-group has-feedback">
                        <input type="password" class="form-control" name="passwordren" placeholder="Re Enter Password" />
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">

                        </div><!-- /.col -->
                        <div class="col-xs-12">
                            <input type="checkbox" name="privacy" />
                             I have <a href="">read</a>, understand and accept the terms and conditions.
                            <button name="btnRegister" type="submit" class="btn btn-block" style="color:#ffffff;">Register Now</button>
                        </div><!-- /.col -->
                    </div>
                </form>
                  
            </div><!-- /.login-box-body -->
            <div style="text-align:center;font-size:17px;margin-top:5px;">
             Already Have Account <a href="login" style="color: #be8a3a; " class="text-center">Sign In</a>
            </div>
        </div><!-- /.login-box -->
        <!-- jQuery 2.1.3 -->
        <script src="<?= base_url("content/theme/plugins/jQuery/jQuery-2.1.3.min.js"); ?>"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="<?= base_url("content/theme/bootstrap/js/bootstrap.min.js"); ?>" type="text/javascript"></script>
        <link href="<?= base_url("content/theme/splugin/notifire/noti.css"); ?>" rel="stylesheet" type="text/css" />
        <script src="<?= base_url("content/theme/splugin/notifire/notij.js"); ?>" type="text/javascript"></script>

 

        <script type="text/javascript">
            $(document).ready(function () {
                 // $.sticky('<br/> Read Warnings Alert.  <br/> <b>' + data + ' <b>', {stickyClass: 'error'}); 
            });
        </script>


    </body>



</html>



