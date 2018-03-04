<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Ilya Nevolin">

        <link rel="shortcut icon" href="custom/imgs/favico.ico">

        <title>Photo generator for your marketing | GridOfLegends</title>

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

        <link href="./plugins/bootstrap-sweetalert/sweet-alert.css" rel="stylesheet" type="text/css">
        
        <!-- Custombox -->
        <link href="./plugins/custombox/css/custombox.css" rel="stylesheet">

        <script src="assets/js/modernizr.min.js"></script>

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <?php require_once('php/top_bar.php'); ?>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>



                                <li class="text-muted menu-title">Editor</li>

                                <li class="has_sub">
                                    <a href="javascript:void(0);" class="waves-effect subdrop"><i class="fa fa-photo"></i> <span> Image tools </span> <span class="menu-arrow"></span></a>
                                    <ul class="list-unstyled" style="display:block;">
                                        <li>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <a href="javascript:void(0);" onclick="randomize_all();">[R]andomize all</a>
                                                </div>
                                            </div>
                                            <div class="row" style="padding-left: 65px;">
                                                <div class="col-sm-9">
                                                    <select class="form-control comp_it_selector">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </li>
                                        <li><a href="javascript:void(0);" onclick="randomize_filter();">[R] filter</a></li>
                                    </ul>
                                </li>
                                <li class="has_sub">
                                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-font"></i> <span> Text tools </span> <span class="menu-arrow"></span></a>
                                    <ul class="list-unstyled">
                                        <li><a href="javascript:void(0);" onclick="randomize_textPos();">[R] text position</a></li>
                                        <li><a href="javascript:void(0);" onclick="randomize_fontStyle();">[R] font style</a></li>
                                        <li><a href="javascript:void(0);" onclick="fontsize_plus();">+ font size</a></li>
                                        <li><a href="javascript:void(0);" onclick="fontsize_minus();">- font size</a></li>
                                        <li>
                                            <div class="row">
                                                <div class="col-sm-12"><a href="javascript:void(0);" onclick="randomize_text();">[R] text</a></div>
                                            </div>
                                            <div class="row" style="padding-left: 65px;">
                                                <div class="col-sm-9"><input id="query" class="form-control" value="success" type="text"></div>
                                            </div>
                                        </li>
                                        <li>
                                             <div class="row" style="padding-left: 65px;">
                                                <div class="col-sm-9">
                                                    <input class="jscolor form-control" value="FFFFFF" style="max-width:100%; width:100%;">
                                                </div>
                                                <div class="col-sm-9">
                                                    <select id="fontsel" name="selector" class="form-control" style="max-width:100%; width:100%;"></select>
                                                </div>
                                            </div>
                                        </li>
                                        <li>&nbsp;</li>
                                        
                                    </ul>
                                </li>
                                <li class="has_sub">
                                    <a href="javascript:void(0);" onclick="exportimg();" class="waves-effect">
                                        <i class="fa fa-save"></i> 
                                        <span> Export/Save </span>
                                    </a>
                                </li>


                            <?php require_once('php/left_sidebar.php'); ?>


                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content" style="margin-top:50px;">
                    <div class="container-fluid">


                        <div class="row">
                            <div class="col-sm-12">
                                <div id="canvas-placeholder" class="col-md-8" style="max-width: 100%; max-height: 100%; overflow:auto; min-height: 250px;">
                                   <canvas id="canvas" style=" padding: 10px;"></canvas>          
                                </div>
                            </div>
                        </div>




                    </div> <!-- container -->

                </div> <!-- content -->

                <footer class="footer text-right">
                    &copy; 2017. All rights reserved.
                    | Compatible with: <img src="custom/imgs/chrome.png" height="20"> and <img src="custom/imgs/firefox.png" height="20">
                    | <a href="mailto:admin@gridoflegends.com">admin@gridoflegends.com</a>
                </footer>

            </div>


        </div>
        <!-- END wrapper -->

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="./custom/js/jquery-3.2.1.min.js"></script>
        <!--<script src="assets/js/jquery.min.js"></script>-->
        <script src="assets/js/popper.min.js"></script><!-- Popper for Bootstrap -->
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <!-- Sweet-Alert  -->
        <script src="./plugins/bootstrap-sweetalert/sweet-alert.min.js"></script>
        <script src="assets/pages/jquery.sweet-alert.init.js"></script>

        <?php 
                echo '
                        <script src="./custom/js/js.cookie-2.1.4.min.js"></script>
                        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
                        <script src="./custom/js/jscolor.min.js"></script>
                        <script src="./custom/js/fabric.min.js"></script>
                        <script src="./custom/js/custom.js"></script>
                    ';
            
        ?>

    </body>
</html>