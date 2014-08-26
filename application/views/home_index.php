<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

    <link rel="stylesheet" href="<?php echo base_url(); ?>css/normalize.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/main.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/orbit.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.vertical-tabs.css">
    <script src="<?php echo base_url(); ?>js/jquery-1.11.1.min.js"></script>
    <script src="<?php echo base_url(); ?>js/vendor/modernizr-2.6.2.min.js"></script>
</head>
<body>

<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<div class="container big-wrapper">
    <div class="row">
        <div class="col-md-12 nav-wrapper">
            <nav class="navbar navbar-default" role="navigation">
                <a class="logo" href="<?php echo base_url(); ?>/user/register"><img src="<?php echo base_url(); ?>/img/logo.jpg" alt=""/></a>
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                    </div>


                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#">PRESS</a></li>
                            <li><a href="#">RADIO</a></li>
                            <li><a href="#">TV</a></li>
                            <li><a href="#">INTERNET</a></li>
                            <li><a href="#">CONTACT</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>
    </div>
    <div class="row">
        <div class=" carousel-container">
            <div id="featured">
             <img  alt=""  src="<?php echo base_url(); ?>img/p7.jpg" />
                 <a href="http://www.google.com"><img alt="" src="<?php echo base_url(); ?>img/p8.jpg" /></a>
                 <a href="http://www.google.com"><img  alt="" src="<?php echo base_url(); ?>img/p9.jpg" /></a>
                 <a href="http://www.google.com"><img  alt="" src="<?php echo base_url(); ?>img/p10.jpg" /></a>
            </div>
        </div>
    </div>
    <div class="row main-page" style="margin-top: 20px">
        <div class="col-md-4">
            <h3>WHO <span>WE ARE</span></h3>

            <span>
                Title some title orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
            </span>
            <br/>
            <span>
               It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </span>
        </div>
        <div class="col-md-8">
            <div class="col-md-6"> <!-- required for floating -->
                <h3>WHAT <span>WE DO</span></h3>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs tabs-left">
                    <li class="active"><a href="#home" data-toggle="tab">Home</a></li>
                    <li><a href="#profile" data-toggle="tab">Profile</a></li>
                    <li><a href="#messages" data-toggle="tab">Messages</a></li>
                    <li><a href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
            </div>

            <div class="col-md-6">
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="home"><img src="<?php echo base_url(); ?>/img/marketing_tab.jpg" alt=""/></div>
                    <div class="tab-pane" id="profile"><img src="<?php echo base_url(); ?>/img/marketing_tab_line.jpg" alt=""/></div>
                    <div class="tab-pane" id="messages"><img src="<?php echo base_url(); ?>/img/marketing_tab.jpg" alt=""/></div>
                    <div class="tab-pane" id="settings"><img src="<?php echo base_url(); ?>/img/marketing_tab_line.jpg" alt=""/></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row main-page horizontal_line">
        <div class="col-md-6">
            <h4>TESTIMONIALS</h4>
            <span>
                  It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </span>
        </div>
        <div class="col-md-3">
            <h4>CONNECT WITH US</h4>
            <img src="<?php echo base_url(); ?>/img/social.jpg" alt=""/>
        </div>
        <div class="col-md-3 pull-right">
            <h4>CONTACT US</h4>
            <form action="" class="form-horizontal">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control input-sm" id="inputEmail3" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control input-sm" id="inputPassword3" placeholder="Password">
                    </div>
                </div>
                <textarea class="form-control" rows="3"></textarea>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Sign in</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <footer>
        <span>Copyright &copy; 2010 CLR MEDIA. All Rights Reserved</span>
    </footer>
</div>

<script src="<?php echo base_url(); ?>js/plugins.js"></script>
<script src="<?php echo base_url(); ?>js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>js/main.js"></script>
<!--<script src="--><?php //echo base_url(); ?><!--js/infinitecarousel/jquery.infinitecarousel3.min.js"></script>-->
<script src="<?php echo base_url(); ?>js/jquery.orbit-1.2.3.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#featured').orbit();
    });
</script>
</body>
</html>
