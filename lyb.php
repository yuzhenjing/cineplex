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

    <meta name="keywords" content="永久免费外服游戏加速器下载-<?php echo $aik['sitename']; ?>">
    <title>永久免费外服游戏加速器下载-<?php echo $aik['sitename']; ?></title>
    <!--[if lt IE 9]>
    <script src="js/html5.js"></script><![endif]-->
</head>

<body class="page-template page-template-pages page-template-posts-play page-template-pagesposts-play-php page page-id-16">
<?php include 'header.php'; ?>
<div class="single-post">
    <section class="container">
        <div class="content-wrap">
            <div class="content">
                <div class="sptitle">
                    <div class="asst asst-post_header"><?php echo $aik['bofang_ad']; ?></div>
                    <img src="images/lybtu.png">
                </div>
                <div class="am-panel am-panel-default">
                    <div class="am-panel-bd">
                        <p class="jianjie">
                        <h3 class="single-strong"><font color="#FF9788">留言求片：</font></h3>
                        <p class="item-desc js-close-wrap">
                        <h4> 我们会第一时间查收您的求片留言、并且尽快上架您需要的片子</br> </h4>

                        </p>

                        <div style="clear: both;"></div>
                    </div>
                </div>
                <!--PC和WAP自适应版-->
                <?php echo $aik['changyan']; ?>
                <?php include "share.php"; ?>
            </div>
        </div>
        <?php include 'sidebar.php'; ?>
    </section>
</div>
<?php include 'footer.php'; ?>
</body>
</html>