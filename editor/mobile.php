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

        <script src="assets/js/modernizr.min.js"></script>

        <script>
        	window.notext = 1;
        </script>

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
                                        </li>
                                        <li><a href="javascript:void(0);" onclick="random_vintage_filter();">[R] vintage filter</a></li>
                                        <li><a href="javascript:void(0);" onclick="clear_filters(true);">clear filter</a></li>
                                        <li><a href="https://seekmetrics.com/hashtag-generator" target="_blank">hashtag gen</a></li>
                                    </ul>
                                </li>
                                <li class="has_sub">
                                    <a href="javascript:void(0);" onclick="exportimg();" class="waves-effect">
                                        <i class="fa fa-save"></i> 
                                        <span> Export/Save </span>
                                    </a>
                                </li>



                             

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
                        <div class="row">
                        	<div class="colr-sm-12">

                                <a href="javascript:void(0);" onclick="randomize_all();">[R]andomize all</a> | &nbsp;
                                <a href="javascript:void(0);" onclick="random_vintage_filter();">[R] vintage filter</a> | &nbsp;
                            	<a href="javascript:void(0);" onclick="clear_filters(true);">clear filter</a> | &nbsp;
                                
                                <br><br><a href="javascript:void(0);" onclick="exportimg();" class="waves-effect">
                                    <i class="fa fa-save"></i> 
                                    <span> Export/Save </span>
                                </a>

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


        <script src="./custom/js/fabric.min.js"></script>
        <script src="./custom/js/custom.js"></script>

    </body>
</html>