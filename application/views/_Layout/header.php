<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Title</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"/>
           <?php require_once 'headerCssJs.php'; ?>
        <script>
            jQuery.ajaxSetup({
                beforeSend: function () {
                    $('#sloader').show();
                },
                complete: function () {
                    $('#sloader').hide();
                },
                success: function () { }
            });
             
            $(document).ready(function () { 
				$.ajax({
			        url:"<?=base_url("Common/Menubar") ?>",
			        type: "Post", 
			        contentType: false,
			        processData: false,
			        success: function (results) {
			        	var dbar = jQuery.parseJSON(results); 
			            $("#sidebar-menu").append(dbar.bar);
			            $.AdminLTE.tree('.sidebar');
			        },
			        error: function () {
			            alert('error');
			        }
			    });
			});
            
            
            
        </script>    
    </head>
    <body class="skin-yellow">
        <div id="sloader" style="top: 30%; left: 50%; position: fixed; z-index: 9999; display: none;width:80px;"> 
            <img src="<?=base_url("content/theme/splugin/notifire/loading7.gif") ?>" alt="loading"/>
        </div>
        <div class="wrapper">

            <header class="main-header">
                <a href="" class="logo"> 
                    <?php echo $this->session->userdata('uname') ?>
                </a> 
                <nav class="navbar navbar-static-top" role="navigation"> 
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav"> 

                            <li class="dropdown messages-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="label label-success">1</span>
                                </a>
 
                                <ul class="dropdown-menu">
                                    <li class="header">You have 1 messages</li>
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <ul class="menu">
                                            <li>
                                                <!-- start message -->
                                                <a href="#">
                                                    <div class="pull-left">
                                                        <img src="<?=base_url("content/theme/dist/img/user2-160x160.jpg") ?>" class="img-circle" alt="User Image" />
                                                    </div>
                                                    <h4>
                                                        Support Team
                                                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                    </h4>
                                                    <p>Why not buy a new awesome theme?</p>
                                                </a>
                                            </li><!-- end message -->

                                        </ul>
                                    </li>
                                    <li class="footer"><a href="#">See All Messages</a></li>
                                </ul>
                            </li>
                            <!-- Notifications: style can be found in dropdown.less -->
                            <li class="dropdown notifications-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-bell-o"></i>
                                    <span class="label label-warning">1</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">You have 1 notifications</li>
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <ul class="menu">
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-users text-aqua"></i> 1 notifications
                                                </a>
                                            </li>

                                        </ul>
                                    </li>
                                    <li class="footer"><a href="#">View all</a></li>
                                </ul>
                            </li>
                            <!-- Tasks: style can be found in dropdown.less -->
                            <li class="dropdown tasks-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-flag-o"></i>
                                    <span class="label label-danger">1</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">You have 1 tasks</li>
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <ul class="menu">

                                            <li>
                                                <!-- Task item -->
                                                <a href="#">
                                                    <h3>
                                                        Make beautiful transitions
                                                        <small class="pull-right">80%</small>
                                                    </h3>
                                                    <div class="progress xs">
                                                        <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">80% Complete</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li><!-- end task item -->
                                        </ul>
                                    </li>
                                    <li class="footer">
                                        <a href="#">View all tasks</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                               
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?=base_url("content/theme/dist/img/user2-160x160.jpg") ?>" class="user-image" alt="User Image" />
                                    <span class="hidden-xs"><?php echo $this->session->userdata('uname') ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="<?=base_url("content/theme/dist/img/user2-160x160.jpg") ?>" class="img-circle" alt="User Image" />
                                        <p>
                                            <?php echo $this->session->userdata('uname') ?>
                                            <small>Member since. date </small>
                                        </p>
                                    </li>
                                    <!-- Menu Body -->

                                    <!-- Menu Footer-->
                                    <li class="user-footer"> 
                                        <div class="pull-right">
                                            <a href="<?=base_url("account/logout") ?>" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?=base_url("content/theme/dist/img/user2-160x160.jpg") ?>" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello <?php echo $this->session->userdata('uname')?> </p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <div class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..." />
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </div>
					 <ul class=sidebar-menu id=sidebar-menu>
						 <li class="active">
	                        <a href="<?=base_url("home") ?>">
	                            <i class="fa fa-dashboard"></i>
	                            <span>Dashboard</span>
	                        </a>
	                    </li> 
                        
                    </ul>
                    <!-- /.MenuBarRoot will here -->


                </section>
                <!-- /.sidebar -->
            </aside>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">