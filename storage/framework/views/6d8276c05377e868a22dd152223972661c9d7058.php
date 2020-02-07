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
        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo e(asset('css/all.css')); ?>">
        <!-- FullCalendar -->
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/lib/fullCalendar/fullcalendar.min.css')); ?>">
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


        <!-- DatePicker -->
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/lib/datePicker/bootstrap-datepicker.min.css')); ?>">

        <!-- ClockPicker -->
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/lib/clockPicker/bootstrap-clockpicker.css')); ?>">

        <!-- Datatable -->
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/lib/dataTable/dataTables.bootstrap.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/lib/dataTable/responsive.bootstrap.min.css')); ?>">

        <!-- File Input -->
        <link href="<?php echo e(asset('file-input/css/fileinput.min.css')); ?>" media="all" rel="stylesheet" type="text/css" />

        <!-- SweetAlert -->
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/lib/sweetAlert/sweetalert2.min.css')); ?>">

        <!-- Chosen -->
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/lib/chosen/chosenStyle.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/lib/chosen/chosen.min.css')); ?>">

        <!-- Select 2 -->
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/lib/select2/select2.min.css')); ?>">


        <!-- Custom Theme Style -->
        <link href="<?php echo e(asset('build/css/custom.min.css')); ?>" rel="stylesheet">

        <link href="<?php echo e(asset('css/styles.css')); ?>" rel="stylesheet">



        <?php echo $__env->yieldContent('styles'); ?>

        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken'     => csrf_token(),
                'language'      => app()->getLocale(),
                'url'           => URL::to('/'),
            ]); ?>;
        </script>
    </head>

    <body class="<?php echo e(Request::path() == 'login' || Request::path() == 'password/reset' ? 'body-content' : ''); ?> nav-md pr-0" style="">
        <div class="container body">
        <?php if(Auth::check() && Request::path() != 'elegirCompania'): ?>
            <div class="main_container">
                <div class="col-md-3 left_col">

                    <div class="left_col scroll-view">

                        <div class="navbar nav_title" style="border: 0;">
                            <a href="<?php echo e(route('home')); ?>" class="site_title"><i class="fa fa-home"></i> </a>

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
                                
                                <?php if(Auth::user()->roles->pluck('id')[0] != 1): ?>
                                    <?php if(session()->get('Session_Company') != ""): ?>
                                        <b><?php echo e(App\User::find(App\Company::find(session()->get('Session_Company'))->user_id)->name); ?></b>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <!-- /menu profile quick info -->

                        <br />

                        <!-- sidebar menu -->
                        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                            <div class="menu_section">
                                <h3>General</h3>
                                    <ul class="nav side-menu">
                                        
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
                                        
                                        <?php $__currentLoopData = MadeMenu::menus(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php echo $__env->make('shared._menu-item', ['item' => $item], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                    </ul>
                            </div>
                        </div>
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


                                        <li class="lang-menu">
                                            <a href="<?php echo e(route('change_lang', ['lang' => 'es'])); ?>"><span class="badge badge-primary">ES</span></a>
                                            <a href="<?php echo e(route('change_lang', ['lang' => 'en'])); ?>"><span class="badge badge-primary">EN</span></a>
                                        </li>
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
                                
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- /top navigation -->
                <div class="right_col" role="main">
                    
                        
                        <?php echo $__env->yieldContent('content'); ?>
                    
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

    <!-- DatePicker -->
    <script src="<?php echo e(asset('js/lib/datePicker/bootstrap-datepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/lib/datePicker/bootstrap-datepicker.es.min.js')); ?>"></script>

    <!-- ClockPicker -->
    <script src="<?php echo e(asset('js/lib/clockPicker/bootstrap-clockpicker.js')); ?>"></script>

    <!-- FullCalendar -->
    <script src="<?php echo e(asset('js/lib/fullCalendar/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/lib/fullCalendar/fullcalendar.min.js')); ?>"></script>

    <!-- Cambiar el idioma del calendario -->
    <?php if(app()->getLocale()=='es'): ?>
        <script src="<?php echo e(asset('js/lib/fullCalendar/es.js')); ?>"></script>
    <?php endif; ?>

    <!-- Datatable -->
    <script src="<?php echo e(asset('js/lib/dataTable/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/lib/dataTable/dataTables.bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/lib/dataTable/dataTables.responsive.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/lib/dataTable/responsive.bootstrap.min.js')); ?>"></script>

    <!-- SweetAlert -->
    <script src="<?php echo e(asset('js/lib/sweetAlert/sweetalert2.min.js')); ?>"></script>

    <!-- text editor -->
    <script src="<?php echo e(asset('/ckeditor/ckeditor.js')); ?>"></script>
    <script>
      try{CKEDITOR.replace( 'header',{
        filebrowserBrowseUrl: '<?php echo e(asset('ckfinder/ckfinder.html')); ?>',
        filebrowserImageBrowseUrl: '<?php echo e(asset('ckfinder/ckfinder.html?type=Images')); ?>',
        filebrowserFlashBrowseUrl: '<?php echo e(asset('ckfinder/ckfinder.html?type=Flash')); ?>',
        filebrowserUploadUrl: '<?php echo e(asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files')); ?>',
        filebrowserImageUploadUrl: '<?php echo e(asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images')); ?>',
        filebrowserFlashUploadUrl: '<?php echo e(asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash')); ?>',
      });}catch{}
    </script>
    <script>
      try{CKEDITOR.replace( 'editor1',{
        filebrowserBrowseUrl: '<?php echo e(asset('ckfinder/ckfinder.html')); ?>',
        filebrowserImageBrowseUrl: '<?php echo e(asset('ckfinder/ckfinder.html?type=Images')); ?>',
        filebrowserFlashBrowseUrl: '<?php echo e(asset('ckfinder/ckfinder.html?type=Flash')); ?>',
        filebrowserUploadUrl: '<?php echo e(asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files')); ?>',
        filebrowserImageUploadUrl: '<?php echo e(asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images')); ?>',
        filebrowserFlashUploadUrl: '<?php echo e(asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash')); ?>',
      });}catch{}
    </script>
    <!-- Moment timezone -->
    <script src="<?php echo e(asset('js/lib/momentTz/moment-timezone-with-data-2012-2022.min.js')); ?>"></script>

    <!-- Chosen -->
    <script src="<?php echo e(asset('js/lib/select2/select2.min.js')); ?>"></script>

    <!-- Vue JS -->
    <script src="<?php echo e(asset('js/vue.js')); ?>"></script>
    <script src="<?php echo e(asset('js/axios.min.js')); ?>"></script>
    <!-- File Input -->
    <script src="<?php echo e(asset('file-input/js/plugins/piexif.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('file-input/js/plugins/sortable.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('file-input/js/plugins/purify.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('file-input/js/fileinput.min.js')); ?>"></script>

    <?php if( file_exists( "file-input/js/locales/".Session::get('lang').".js" ) ): ?>
        <input type="hidden" name="lang" id="lang" value="<?php echo e(Session::get('lang')); ?>">
        <script src="<?php echo e(asset('file-input/js/locales/'.Session::get('lang').'.js')); ?>"></script>
    <?php else: ?>
        <input type="hidden" name="lang" id="lang" value="es">
        <script src="<?php echo e(asset('file-input/js/locales/es.js')); ?>"></script>
    <?php endif; ?>

    <!-- Js to application -->
    <script src="<?php echo e(asset('js/applicationEvents.js')); ?>"></script>

    <?php echo $__env->yieldContent('scripts'); ?>

    <!-- Custom Theme Scripts -->
    <script src="<?php echo e(asset('build/js/custom.js')); ?>"></script>

    <?php if(session('alert')): ?>
        <script>
            toast({
                type: '<?php echo session('alert')[0] ?>',
                title: '<?php echo session('alert')[1] ?>',
                //timer: 10000
            });
            changeTopToast();
        </script>
    <?php endif; ?>
        <div id="not_carga" class="notificacion_carga">
            <div class="container_load">
                <div class="item_load item-1_load"></div>
                <div class="item_load item-2_load"></div>
                <div class="item_load item-3_load"></div>
                <div class="item_load item-4_load"></div>
            </div>
            Loading...
        </div>
  </body>
</html>
