<?php  ?><!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title>Monkey</title>
    <meta name="keywords" content="404 page, monkey, css3, template, html5 template" />
    <meta name="description" content="404 - Page Template" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <!-- Libs CSS -->
    <link type="text/css" media="all" href="/framework/resources/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Template CSS -->
    <link type="text/css" media="all" href="/framework/resources/css/style.css" rel="stylesheet" />
    <!-- Responsive CSS -->
    <link type="text/css" media="all" href="/framework/resources/css/respons.css" rel="stylesheet" />

    <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>

</head>
<body>

    <div class="animationload">
        <div class="loader">
        </div>
    </div>


    <!-- Content Wrapper -->
    <div id="wrapper">
        <div class="container">
            <div class="col-xs-12 col-sm-7 col-lg-7">
                <!-- Info -->
                <div class="info">
                    <h1>404</h1>
                    <h2>Página no encontrada  </h2>
                    <p>La página solicitada no se encuentra disponible en el sistema</p>
                    <a href="http://localhost/framework" class="btn" id="back">Volver</a>
                </div>
                <!-- end Info -->
            </div>

            <div class="col-xs-12 col-sm-5 col-lg-5 text-center">
                <!-- Monkey -->
                <div class="monkey">
                    <img src="/framework/resources/img/monkey.gif" alt="Monkey" />
                </div>
                <!-- end Monkey -->
            </div>

        </div>
        <!-- end container -->
    </div>
    <!-- end Content Wrapper -->


    <!-- Scripts -->
    <script src="/framework/resources/js/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script src="/framework/resources/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="/framework/resources/js/modernizr.custom.js" type="text/javascript"></script>
    <script src="/framework/resources/js/jquery.nicescroll.min.js" type="text/javascript"></script>
    <script src="/framework/resources/js/scripts.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(function() {
        $('#back').click(function(event) {
            event.preventDefault();
            window.history.back();
        });
    });
    </script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</body>
</html>
