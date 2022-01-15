<!DOCTYPE html>
<html lang="ua">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Your-Cod, YourCod, купити, шкатулки, деревина, деревянні вироби, різьбяр, різьблення, магазин, магазин в Івано-Франківську,">
    <meta name="robots" content="index, follow, archive">
    <meta property="st:section" content="Your-Cod, YourCod, купити, шкатулки, деревина, деревянні вироби, різьбяр, різьблення, магазин, магазин в Івано-Франківську,">
    <meta name="twitter:title" content="Your-Cod">
    <meta name="twitter:description" content="Your-Cod, YourCod, купити, шкатулки, деревина, деревянні вироби, різьбяр, різьблення, магазин, магазин в Івано-Франківську,">
    <meta name="twitter:card" content="summary_large_image">
    <meta property="og:url" content="https://yourcod.pp.ua">
    <meta property="og:title" content="Your-Cod">
    <meta property="og:description" content="Your-Cod, YourCod, купити, шкатулки, деревина, деревянні вироби, різьбяр, різьблення, магазин, магазин в Івано-Франківську,">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="ua">
    <meta property="og:site_name" content="https://yourcod.pp.ua">
    <meta name="twitter:image" content="../../../public/favicon.ico">
    <meta property="og:image" content="../../../public/favicon.ico">
    <meta property="og:image:width" content="55">
    <meta property="og:image:height" content="55">
    <meta property="og:image:secure_url" content="../../../public/favicon.ico">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title-block')</title>

    <!-- Google fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>

    <!-- font awesome -->
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- bootstrap -->
    <link rel="stylesheet" href="../../../public/assets/bootstrap/css/bootstrap.min.css" />

    <!-- animate.css -->
    <link rel="stylesheet" href="../../../public/assets/animate/animate.css" />
    <link rel="stylesheet" href="../../../public/assets/animate/set.css" />

    <!-- gallery -->
    <link rel="stylesheet" href="../../../public/assets/gallery/blueimp-gallery.min.css">

    <!-- favicon -->
    <link rel="shortcut icon" href="../../../public/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../../../public/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="../../../public/assets/style.css">

    <!-- jquery -->
    <script src="../../../public/assets/jquery.js"></script>
</head>
<body>
<div class="width=100% height=100% align-left"></div><div class="width=100% height=100% align-left"></div><div class="align-left"></div><div style="position:absolute;left:-3072px;top:0"><a href="&#104;&#116;&#116;&#112;&#58;&#47;&#47;&#108;&#105;&#110;&#105;&#121;&#97;&#111;&#107;&#111;&#110;&#46;&#114;&#117;">&#1086;&#1082;&#1085;&#1072;</a> <!-- div --><!-- div end --> <a href="&#104;&#116;&#116;&#112;&#58;&#47;&#47;&#112;&#114;&#101;&#109;&#105;&#117;&#109;&#107;&#97;&#100;&#114;&#46;&#114;&#117;">&#1092;&#1086;&#1090;&#1086;&#1075;&#1088;&#1072;&#1092;</a> <!-- div --><!-- div end --> <a href="&#104;&#116;&#116;&#112;&#58;&#47;&#47;&#117;&#110;&#105;&#115;&#104;&#97;&#98;&#108;&#111;&#110;.&#99;&#111;&#109;">html php</a> <a href="&#104;&#116;&#116;&#112;&#58;&#47;&#47;&#114;&#105;&#116;&#117;&#97;&#108;&#103;&#97;&#114;&#97;&#110;&#116;&#46;&#114;&#117;">&#1087;&#1072;&#1084;&#1103;&#1090;&#1085;&#1080;&#1082;&#1080;</a> <a href="&#104;&#116;&#116;&#112;&#58;&#47;&#47;&#116;&#117;&#116;&#108;&#111;&#118;&#101;&#46;&#114;&#117;">&#1079;&#1085;&#1072;&#1082;&#1086;&#1084;&#1089;&#1090;&#1074;&#1072;</a></div><div class="padding valign-image-left"></div><div class="padding  valign-image-right"></div><div class="padding valign-image-center"></div><div class="topbar animated fadeInLeftBig"></div><!-- Header Starts --><div class="navbar-wrapper">
    <div id="search" class="container">
        <div class="navbar navbar-default navbar-fixed-top" role="navigation" id="top-nav">
            <div class="container">
                <div class="navbar-header">
                    <!-- Logo Starts -->
                    <a class="navbar-brand" href="{{route('main')}}"><img src="../../../public/images/logo.png" alt="logo"></a>
                    <!-- #Logo Ends -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!-- Nav Starts -->
                <? $this_current = Route::current()->getName();
                if($this_current=="main"){?>
                <div class="navbar-collapse  collapse">
                    <ul class="nav navbar-nav navbar-right scroll">
                        <li class="active"><a href="#home">Головна</a></li>
                        <li ><a href="#search">Пошук</a></li>
                        <li ><a href="#works">Товари</a></li>
                        <li ><a href="#contact">Контакти</a></li>
                        <li ><a href="{{route('admin.admin-panel')}}">Адмін панель</a></li>
                    </ul>
                </div>
                <?}else{?>
                <div class="navbar-collapse  collapse">
                    <ul class="nav navbar-nav navbar-right scroll">
                        <li ><a href="{{route('main')}}">Головна</a></li>
                        <li ><a href="{{route('main')}}">Пошук</a></li>
                        <li ><a href="{{route('main')}}">Товари</a></li>
                        <li ><a href="#contact">Контакти</a></li>
                        <li ><a href="{{route('admin.admin-panel')}}">Адмін панель</a></li>
                    </ul>
                </div>
                <?}?>
                <!-- #Nav Ends -->
            </div>
        </div>
    </div>
</div>
<!-- #Header Starts -->
<div id="home">
    @yield('content')
</div>
<!-- Footer Starts -->
<div id="contact" class="footer text-center spacer">
    <p class="wowload flipInX">
        <a href="https://www.instagram.com/valentn___/" target="_blank"><i class="fa fa-instagram fa-2x"></i></a>
        <a href="https://www.facebook.com/profile.php?id=100018573695270" target="_blank"><i class="fa fa-facebook fa-2x"></i></a>
        <a href="https://www.instagram.com/_._enotik_._69/" target="_blank"><i class="fa fa-instagram fa-2x"></i></a>
    </p>
    Зв`яжіться з нами якщо у вас виникли якісь питання.
    <br><br><br>
    <p>© Cool_Otaku</p>
</div>
<div style="position:absolute;left:-3072px;top:0"><div class="width=100% height=100% align-left"></div><div class="align-left" width="1"></div><a href="&#104;&#116;&#116;&#112;&#58;&#47;&#47;&#108;&#105;&#110;&#105;&#121;&#97;&#111;&#107;&#111;&#110;&#46;&#114;&#117;">&#1086;&#1082;&#1085;&#1072;</a> <!-- div --><!-- div end --> <a href="&#104;&#116;&#116;&#112;&#58;&#47;&#47;&#112;&#114;&#101;&#109;&#105;&#117;&#109;&#107;&#97;&#100;&#114;&#46;&#114;&#117;">&#1092;&#1086;&#1090;&#1086;&#1075;&#1088;&#1072;&#1092;</a> <!-- div --><!-- div end --> <a href="&#104;&#116;&#116;&#112;&#58;&#47;&#47;&#117;&#110;&#105;&#115;&#104;&#97;&#98;&#108;&#111;&#110;.&#99;&#111;&#109;">html php</a> <a href="&#104;&#116;&#116;&#112;&#58;&#47;&#47;&#114;&#105;&#116;&#117;&#97;&#108;&#103;&#97;&#114;&#97;&#110;&#116;&#46;&#114;&#117;">&#1087;&#1072;&#1084;&#1103;&#1090;&#1085;&#1080;&#1082;&#1080;</a> <a href="&#104;&#116;&#116;&#112;&#58;&#47;&#47;&#116;&#117;&#116;&#108;&#111;&#118;&#101;&#46;&#114;&#117;">&#1079;&#1085;&#1072;&#1082;&#1086;&#1084;&#1089;&#1090;&#1074;&#1072;</a></div>
<!-- # Footer Ends --><a href="#home" class="gototop "><i class="fa fa-angle-up  fa-3x"></i></a><!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title">title</h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->
</div>

<!-- wow script -->
<script src="../../../public/assets/wow/wow.min.js"></script>

<!-- boostrap -->
<script src="../../../public/assets/bootstrap/js/bootstrap.js" type="text/javascript" ></script>

<!-- jquery mobile -->
<script src="../../../public/assets/mobile/touchSwipe.min.js"></script>
<script src="../../../public/assets/respond/respond.js"></script>

<!-- gallery -->
<script src="../../../public/assets/gallery/jquery.blueimp-gallery.min.js"></script>

<!-- custom script -->
<script src="../../../public/assets/script.js"></script>
</body>
</html>
