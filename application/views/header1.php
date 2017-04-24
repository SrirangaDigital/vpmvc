<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic Page Needs
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta charset="utf-8">
    <title><?php if($pageTitle) echo $pageTitle . ' | '; ?>ವಿವೇಕಪ್ರಭ</title>
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
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?=PUBLIC_URL?>js/jquery-1.11.0.min.js"></script>
 
    <!-- CSS
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="stylesheet" href="<?=PUBLIC_URL?>css/normalize.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="css/skeleton.css"> -->

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="<?=PUBLIC_URL?>css/reset.css">
    <link rel="stylesheet" href="<?=PUBLIC_URL?>css/archivestyle.css">


    <script type="text/javascript">var base_url = "<?= BASE_URL?>";</script>
    <!-- Favicon
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="icon" type="image/png" href="<?=PUBLIC_URL?>images/favicon.png">
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
					<li><a href="javascript:void();">ವಿವೇಕಪ್ರಭ</a></li>
					<li><a href="javascript:void();">ಧ್ಯೇಯ </a></li>
					<li><a <?php if(preg_match('/listing\/volumes|/', $path) || preg_match('/listing\/issue|/', $path)): ?> class="active" href="javascript:void();" <?php else: ?> href="<?=BASE_URL . "listing/volumes"?>" <?php endif; ?>>ಹಿಂದಿನ ಸಂಚಿಕೆಗಳು </a></li>
				</ul>
			</div>
		</div> 
		<div class="body">
			<div class="column1">
				<div class="subnav">
					<ul>
						<li><a href="<?= BASE_URL?>listing/articles">ಲೇಖನಗಳು</a></li>
						<li>|</li>
						<li><a href="javascript:void();">ಲೇಖಕರು</a></li>
						<li>|</li>
						<li><a <?php if(preg_match('/listing\/volumes/', $path) || preg_match('/listing\/issue|/', $path)): ?> class="active" href="<?= BASE_URL?>listing/volumes" <?php else: ?> href="<?=BASE_URL . "listing/volumes"?>" <?php endif; ?>>ಸಂಪುಟಗಳು</a></li>
						<li>|</li>
						<li><a  href="javascript:void();">ಸ್ಥಿರ ಶೀರ್ಷಿಕೆ </a></li>
					</ul>
				</div>
