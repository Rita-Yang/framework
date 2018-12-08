<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, 
  initial-scale=1.0, minimum-scale=0.8, maximum-scale=2.0, 
  user-scalable=no">
	<title><?= $title ?> - Daniel Wellington</title>
    <base href="<?= base_url(); ?>">
	<link rel="stylesheet" href="assets/css/main.css">
    <script src="assets/js/jquery-1.12.0.min.js"></script>
    <script src="assets/js/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="assets/css/jquery-ui.css">
</head>
<body>
    <nav>
        <div class="header">
            <div class="logo"><a href="index.php"><img src="assets/images/index/logo.png"></a></div>
            <div data-menupage="<?= $page; ?>" class="menu">
                <ul>
                    <li data-hh="brand"><a href="brand">品牌故事</a></li>
                    <li data-hh="activity"><a href="activity_list">活動專區</a></li>
                    <li data-hh="product"><a href="product_list/0#1">全部商品</a></li>
                    <li data-hh="article"><a href="article_list">所有消息</a></li>
                    <li data-hh="store"><a href="store">銷售據點</a></li>
                    <?php if (!isset($_SESSION['user'])): ?>
                        <li data-hh="login"><a href="member/logReg">登入註冊</a></li>
                    <?php else: ?>
                        <li data-hh="member" id="member"><a id="member_list" data-h1="member_list" href="member"><img src="assets/images/menu/icon-user.png"></a>/<a id="cart_list" data-h1="cart_list" href="shopping/cart_list"><img data-hh="cart_list" src="assets/images/menu/icon-cart.png"><span class="badge">0</span></a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <div class="red_line"></div>
    </nav>
