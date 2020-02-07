<!DOCTYPE html>
<html lang="<?php echo e(config('app.locale')); ?>">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="images/favicon.ico" type="image/ico" />

        <title><?php echo $__env->yieldContent('title'); ?> <?php echo e(config('app.name')); ?></title>

        <!--  -->
        <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/styles.css')); ?>" rel="stylesheet">   
        <!-- Bootstrap -->
        <link href="<?php echo e(asset('vendors/bootstrap/dist/css/bootstrap.min.css')); ?>" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="<?php echo e(asset('vendors/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet">
        <!-- NProgress -->
        <link href="<?php echo e(asset('vendors/nprogress/nprogress.css')); ?>" rel="stylesheet">
        <!-- iCheck -->
        <link href="<?php echo e(asset('vendors/iCheck/skins/flat/green.css')); ?>" rel="stylesheet">
        
        <!-- bootstrap-progressbar -->
        <link href="<?php echo e(asset('vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')); ?>" rel="stylesheet">
        <!-- JQVMap -->
        <link href="<?php echo e(asset('vendors/jqvmap/dist/jqvmap.min.css')); ?>" rel="stylesheet"/>
        <!-- bootstrap-daterangepicker -->
        <link href="<?php echo e(asset('vendors/bootstrap-daterangepicker/daterangepicker.css')); ?>" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="<?php echo e(asset('build/css/custom.css')); ?>" rel="stylesheet">
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>;
        </script>
    </head>

    <body class="<?php echo e(Request::path() == 'login' || Request::path() == 'password/reset' ? 'body-content' : ''); ?> nav-md">
        <div class="container body">
        <?php if(Auth::check()): ?>
            <div class="main_container">
                <div class="col-md-3 left_col">
                
                    <div class="left_col scroll-view">
                    
                        <div class="navbar nav_title" style="border: 0;">
                            <a href="<?php echo e(route('login')); ?>" class="site_title"><i class="fa fa-bullseye"></i> </a>
                        </div>
                        
                        <div class="clearfix"></div>
                        
                        <!-- menu profile quick info -->
                        <div class="profile clearfix">
                            <div class="profile_pic">                        
                                <img src="<?php echo e(asset(Auth::user()->picture)); ?>" alt="..." class="img-circle profile_img">
                            </div>
                            <div class="profile_info">
                                <span><?php echo app('translator')->getFromJson('header.Welcome'); ?>,</span>
                                <h2><?php echo e(Auth::user()->name); ?></h2>
                            </div>
                        </div>
                        <!-- /menu profile quick info -->
                       
                        <br />

                        <!-- sidebar menu -->
                        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                            <div class="menu_section">
                                <h3>General</h3>
                                    <ul class="nav side-menu">
                                        <li><a><i class="fa fa-cogs"></i> <?php echo app('translator')->getFromJson('words.ManagementTools'); ?> <span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <?php if(Auth::check()): ?>
                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_users')): ?>
                                                        <li class="<?php echo e(Request::is('users*') ? 'active' : ''); ?>">
                                                            <a href="<?php echo e(route('users.index')); ?>">
                                                                <span class="text-info glyphicon glyphicon-user"></span> <?php echo app('translator')->getFromJson('words.ManageUsers'); ?>
                                                            </a>
                                                        </li>
                                                    <?php endif; ?>                                                    

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_permissions')): ?>
                                                        <li class="<?php echo e(Request::is('permissions*') ? 'active' : ''); ?>">
                                                            <a href="<?php echo e(route('permissions.index')); ?>">
                                                                <span class="text-danger glyphicon glyphicon-wrench"></span> <?php echo app('translator')->getFromJson('words.ManagePermission'); ?>
                                                            </a>
                                                        </li>
                                                    <?php endif; ?> 

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_roles')): ?>
                                                        <li class="<?php echo e(Request::is('roles*') ? 'active' : ''); ?>">
                                                            <a href="<?php echo e(route('roles.index')); ?>">
                                                                <span class="text-danger glyphicon glyphicon-lock"></span> <?php echo app('translator')->getFromJson('words.ManageRoles'); ?>
                                                            </a>
                                                        </li>
                                                    <?php endif; ?>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_modulos')): ?>
                                                        <li class="<?php echo e(Request::is('modulos*') ? 'active' : ''); ?>">
                                                            <a href="<?php echo e(route('modulos.index')); ?>">
                                                                <span class="text-warning glyphicon glyphicon-tasks"></span> <?php echo app('translator')->getFromJson('words.ManageModulo'); ?>
                                                            </a>
                                                        </li>
                                                    <?php endif; ?>

                                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_menus')): ?>
                                                        <li class="<?php echo e(Request::is('menus*') ? 'active' : ''); ?>">
                                                            <a href="<?php echo e(route('menus.index')); ?>">
                                                                <span class="text-success glyphicon glyphicon-th-list"></span> <?php echo app('translator')->getFromJson('words.ManageMenu'); ?>
                                                            </a>
                                                        </li>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </ul>
                                        </li> 
                                        <!--<li><a><i class="fa fa-suitcase"></i> App <span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_posts')): ?>
                                                    <li class="<?php echo e(Request::is('posts*') ? 'active' : ''); ?>">
                                                        <a href="<?php echo e(route('posts.index')); ?>">
                                                            <span class="text-success glyphicon glyphicon-text-background"></span> Posts
                                                        </a>
                                                    </li>
                                                <?php endif; ?>
                                            </ul>
                                        </li>-->

                                        <!-- Made Menu, with modules -->
                                        <?php if(count(MadeMenu::get_modules()) >0): ?>
                                            <?php $__currentLoopData = MadeMenu::get_modules(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modulo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li><a><i class="fa fa-suitcase"></i><?php echo e($modulo->name); ?><span class="fa fa-chevron-down"></span></a>
                                                    <ul class="nav child_menu">
                                                        <?php $__currentLoopData = MadeMenu::get_item_modules($modulo->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view_'.$item->url)): ?>
                                                                <li class="<?php echo e(Request::is($item->name.'*') ? 'active' : ''); ?>">
                                                                    <?php if(MadeMenu::item_has_child($item->id) >=0): ?>
                                                                    <a>
                                                                        <span class="text-success glyphicon glyphicon-text-background"></span> <?php echo e($item->name); ?>

                                                                    </a>
                                                                    <?php else: ?>
                                                                    <a href="<?php echo e(route('posts.index')); ?>">
                                                                        <span class="text-success glyphicon glyphicon-text-background"></span> <?php echo e($item->name); ?>

                                                                    </a>
                                                                    <?php endif; ?>

                                                                    <?php if( count(MadeMenu::get_child_items($item->id)) > 0): ?>
                                                                        <ul class="nav child_menu">
                                                                            <?php $__currentLoopData = MadeMenu::get_child_items($item->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <li>
                                                                                    <a href="<?php echo e(route($child->url.'.index')); ?>"><span></span><?php echo e($child->name); ?></a>
                                                                                </li>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </ul> 
                                                                    <?php endif; ?>
                                                                </li>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                                                              
                                    </ul>
                            </div>                                
                        </div>
                        <!-- /sidebar menu -->

                        <?php endif; ?>
                    </div>
                </div>

                <!-- top navigation -->
                <div class="top_nav">
                    <div class="nav_menu">
                        <nav>
                            <div class="nav toggle">
                                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                            </div>
                            <div class="navbar-header">
                                <!-- Branding Image -->
                                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                                    <span><?php echo $__env->yieldContent('title'); ?> <?php echo e(config('app.name')); ?></span>                     
                                </a>
                            </div>
                            
                            
                            <ul class="nav navbar-nav navbar-right">
                                <?php if(Auth::check()): ?>
                                <li class="">
                                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <img src="<?php echo e(asset(Auth::user()->picture)); ?>" alt=""><?php echo e(Auth::user()->name); ?>

                                        <span class=" fa fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                                        <li><a href="<?php echo e(route('perfiles.index')); ?>"><?php echo app('translator')->getFromJson('header.Profile'); ?></a></li>                                        
                                        <li><a href="javascript:;"><?php echo app('translator')->getFromJson('header.Help'); ?></a></li>
                                        <li>
                                            <a href="<?php echo e(route('logout')); ?>"
                                                onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                                <i class="glyphicon glyphicon-log-out"></i> <?php echo app('translator')->getFromJson('header.Logout'); ?>
                                            </a>

                                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                                <?php echo e(csrf_field()); ?>

                                            </form>
                                        </li>
                                    </ul>
                                </li>
                               
                                <li role="presentation" class="dropdown">
                                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-envelope-o"></i>
                                        <span class="badge bg-green">1</span>
                                    </a>
                                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                        <li>
                                            <a>
                                                <span class="image"><img src="images/user.png" alt="Profile Image" /></span>
                                                <span>
                                                    <span><?php echo e(Auth::user()->name); ?></span>
                                                    <span class="time">3 mins ago</span>
                                                </span>
                                                <span class="message">
                                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                                </span>
                                            </a>
                                        </li>                                        
                                        <li>
                                            <div class="text-center">
                                                <a>
                                                    <strong>See All Alerts</strong>
                                                    <i class="fa fa-angle-right"></i>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <?php endif; ?>                                                                                   
                                <li><a href="<?php echo e(route('change_lang', ['lang' => 'es'])); ?>"><span class="badge badge-primary">ES</span></a></li>
                                <li><a href="<?php echo e(route('change_lang', ['lang' => 'en'])); ?>"><span class="badge badge-primary">EN</span></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- /top navigation -->
                <div class="container right_col" role="main">                    
                    
                    <div class="content-page">
                    <div id="flash-msg">
                        <?php echo $__env->make('flash::message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                    <?php echo $__env->yieldContent('content'); ?>
                    </div>
                </div>
            </div>
            
            
        </div>
        

    <!-- jQuery -->
    <script src="<?php echo e(asset('vendors/jquery/dist/jquery.min.js')); ?>"></script>
    <!-- Bootstrap -->
    <script src="<?php echo e(asset('vendors/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
    <!-- FastClick -->
    <script src="<?php echo e(asset('vendors/fastclick/lib/fastclick.js')); ?>"></script>
    <!-- NProgress -->
    <script src="<?php echo e(asset('vendors/nprogress/nprogress.js')); ?>"></script>
    <!-- Chart.js -->
    <script src="<?php echo e(asset('vendors/Chart.js/dist/Chart.min.js')); ?>"></script>
    <!-- gauge.js -->
    <script src="<?php echo e(asset('vendors/gauge.js/dist/gauge.min.js')); ?>"></script>
    <!-- bootstrap-progressbar -->
    <script src="<?php echo e(asset('vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')); ?>"></script>
    <!-- iCheck -->
    <script src="<?php echo e(asset('vendors/iCheck/icheck.min.js')); ?>"></script>
    <!-- Skycons -->
    <script src="<?php echo e(asset('vendors/skycons/skycons.js')); ?>"></script>
    <!-- Flot -->
    <script src="<?php echo e(asset('vendors/Flot/jquery.flot.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/Flot/jquery.flot.pie.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/Flot/jquery.flot.time.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/Flot/jquery.flot.stack.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/Flot/jquery.flot.resize.js')); ?>"></script>
    <!-- Flot plugins -->
    <script src="<?php echo e(asset('vendors/flot.orderbars/js/jquery.flot.orderBars.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/flot-spline/js/jquery.flot.spline.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/flot.curvedlines/curvedLines.js')); ?>"></script>
    <!-- DateJS -->
    <script src="<?php echo e(asset('vendors/DateJS/build/date.js')); ?>"></script>
    <!-- JQVMap -->
    <script src="<?php echo e(asset('vendors/jqvmap/dist/jquery.vmap.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/jqvmap/dist/maps/jquery.vmap.world.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')); ?>"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?php echo e(asset('vendors/moment/min/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('vendors/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo e(asset('build/js/custom.min.js')); ?>"></script>
	
    <!-- Js to application -->
    <script src="<?php echo e(asset('js/applicationEvents.js')); ?>"></script>
  </body>
</html>
