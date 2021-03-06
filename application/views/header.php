<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic Page Needs
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta charset="utf-8">
    <title>ವಿವೇಕಪ್ರಭ</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Mobile Specific Metas
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FONT
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="stylesheet" id="royal_enqueue_Lato-css" href="https://fonts.googleapis.com/css?family=Lato%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900&amp;ver=1.0.0" type="text/css" media="all">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400italic,400,600,700' rel='stylesheet' type='text/css'>
    <!-- Javascript calls
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
 
    <link rel="stylesheet" href="<?=PUBLIC_URL?>css/reset.css">
    <link rel="stylesheet" href="<?=PUBLIC_URL?>css/indexstyle1.css">


    <script type="text/javascript">var base_url = "<?= BASE_URL?>";</script>
    <!-- Favicon
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="icon" type="image/png" href="<?=PUBLIC_URL?>images/favicon.png">
    <script type="text/javascript" src="<?=PUBLIC_URL?>js/common.js"></script>
</head>
<body>

    <div class="page">
		<div class="header">
			<div class="logo">
				<img class="logo_img" src="<?=PUBLIC_URL?>images/Logo.jpg" alt="Logo" title="Logo"/>
			</div>
			<div class="title">
				ವಿವೇಕಪ್ರಭ
			</div>
			<div class="toptitle">
				ಶ್ರೀರಾಮಕೃಷ್ಣ ಆಶ್ರಮ, ಮೈಸೂರು
			</div>
			<div class="subtitle">
				ರಾಮಕೃಷ್ಣ ಮಹಾಸಂಘದ ಏಕೈಕ ಕನ್ನಡ ಮಾಸಪತ್ರಿಕೆ
			</div>
			<div id="headnav">
				<ul>
					<li><a href="javascript:void();">Font Help</a></li>
					<li>|</li>
					<li><a href="javascript:void();">Site Map</a></li>
					<li>|</li>
					<li><a href="javascript:void();">Register</a></li>
					<li>|</li>				
					<li><a href="javascript:void();">Contact us</a></li>				
				</ul>
			</div>
			<div id="nav">
				<ul>
					<li><a <?php if(preg_match('/flat/', $path)):?> class = "active" <?php endif; ?> href="javascript:void();">ವಿವೇಕಪ್ರಭ</a></li>
					<li><a href="">ಧ್ಯೇಯ </a></li>
					<li><a href="<?=BASE_URL . "listing/volumes"?>">ಹಿಂದಿನ ಸಂಚಿಕೆಗಳು</a></li>
				</ul>
			</div>
		</div>
