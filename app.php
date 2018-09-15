<?php
include('./inc/aik.config.php');
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta http-equiv="cache-control" content="no-siteapp">
    <link rel='stylesheet' id='main-css' href='css/style.css' type='text/css' media='all'/>
    <link rel='stylesheet' id='main-css' href='css/play.css' type='text/css' media='all'/>
    <script type='text/javascript' src='http://apps.bdimg.com/libs/jquery/2.0.0/jquery.min.js?ver=0.5'></script>

    <meta name="keywords" content="艾克影院手机客户端下载-<?php echo $aik['sitename']; ?>">
    <title>艾克影院手机客户端下载-<?php echo $aik['sitename']; ?></title>
    <!--[if lt IE 9]>
    <script src="js/html5.js"></script><![endif]-->
</head>

<body class="page-template page-template-pages page-template-posts-play page-template-pagesposts-play-php page page-id-16">
<?php include 'header.php'; ?>
<div class="single-post">
    <script>
        var w = '100%'; //宽度
        var h = '800'; //高度
        var s = 'no'; //是否显示滚动条，yes显示，no不显示
        document.write('<iframe width=' + w + ' height=' + h + ' src="app.html" frameborder=0 border=0 marginwidth=0 marginheight=0 scrolling=' + s + '></iframe>');
    </script>
</div>
<?php include 'footer.php'; ?>
</body>
</html>