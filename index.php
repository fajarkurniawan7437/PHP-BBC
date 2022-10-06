<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title>BBC-English Training Specialist Online</title>

	<meta name="description" content="top menu &amp; navigation" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

	<script src="assets/js/jquery-2.1.4.min.js"></script>
	<!-- bootstrap & fontawesome -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

	<!-- page specific plugin styles -->

	<!-- text fonts -->
	<link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

	<!-- ace styles -->
	<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

	<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
	<link rel="stylesheet" href="assets/css/addtional.css" />
	<link rel="stylesheet" href="assets/css/ace-skins.min.css" />
	<link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

	<!-- date time picker by eep terbaik -->
	<link rel="stylesheet" href="assets/css/eep/bootstrap-datetimepicker.min.css" />
	<script src="assets/js/eep/bootstrap-datetimepicker.min.js"></script>
	<!-- date time picker by eep terbaik -->
	<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

	<!-- inline styles related to this page -->

	<!-- ace settings handler -->
	<script src="assets/js/ace-extra.min.js"></script>

	<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

	<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	<style>
		footer {
			background-color: #0c1a1e;
			min-height: 350px;
			font-family: 'Open Sans', sans-serif;
		}

		.footerleft {
			margin-top: 50px;
			padding: 0 36px;
		}

		.logofooter {
			margin-bottom: 10px;
			font-size: 25px;
			color: #fff;
			font-weight: 700;
		}

		.footerleft p {
			color: #fff;
			font-size: 12px !important;
			font-family: 'Open Sans', sans-serif;
			margin-bottom: 15px;
		}

		.footerleft p i {
			width: 20px;
			color: #999;
		}


		.paddingtop-bottom {
			margin-top: 50px;
		}

		.footer-ul {
			list-style-type: none;
			padding-left: 0px;
			margin-left: 2px;
		}

		.footer-ul li {
			line-height: 29px;
			font-size: 12px;
		}

		.footer-ul li a {
			color: #a0a3a4;
			transition: color 0.2s linear 0s, background 0.2s linear 0s;
		}

		.footer-ul i {
			margin-right: 10px;
		}

		.footer-ul li a:hover {
			transition: color 0.2s linear 0s, background 0.2s linear 0s;
			color: #ff670f;
		}

		.social:hover {
			-webkit-transform: scale(1.1);
			-moz-transform: scale(1.1);
			-o-transform: scale(1.1);
		}




		.icon-ul {
			list-style-type: none !important;
			margin: 0px;
			padding: 0px;
		}

		.icon-ul li {
			line-height: 75px;
			width: 100%;
			float: left;
		}

		.icon {
			float: left;
			margin-right: 5px;
		}


		.copyright {
			min-height: 40px;
			background-color: #000000;
		}

		.copyright p {
			text-align: left;
			color: #FFF;
			padding: 10px 0;
			margin-bottom: 0px;
		}

		.heading7 {
			font-size: 21px;
			font-weight: 700;
			color: #d9d6d6;
			margin-bottom: 22px;
		}

		.post p {
			font-size: 12px;
			color: #FFF;
			line-height: 20px;
		}

		.post p span {
			display: block;
			color: #8f8f8f;
		}

		.bottom_ul {
			list-style-type: none;
			float: right;
			margin-bottom: 0px;
		}

		.bottom_ul li {
			float: left;
			line-height: 40px;
		}

		.bottom_ul li:after {
			content: "/";
			color: #FFF;
			margin-right: 8px;
			margin-left: 8px;
		}

		.bottom_ul li a {
			color: #FFF;
			font-size: 12px;
		}
	</style>
</head>

<body>
	<div id="navbar" class="navbar navbar-default    navbar-collapse       h-navbar ace-save-state">
		<div class="navbar-container ace-save-state" id="navbar-container">
			<div class="navbar-header pull-left">
				<a href="?menu=home" class="navbar-brand">
					<small>
						<i class="fa fa-leaf"></i>
						BBC-English Training Specialist Online
					</small>
				</a>
			</div>

			<div class="navbar-buttons navbar-header pull-right  collapse navbar-collapse" role="navigation">
				<ul class="nav ace-nav">
					<?php if (isset($_SESSION['login_user'])) { ?>
						<li class="light-blue dropdown-modal user-min">

							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="assets/images/avatars/user.jpg" alt="Jason's Photo" />
								<?php echo $_SESSION['login_user']; ?>
								<span class="user-info">
									<small>Selamat Datang</small>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="index.php?menu=jadwal">
										<i class="ace-icon fa fa-calendar"></i>
										Jadwal Kursus
									</a>
								</li>
								<li>
									<a href="index.php?menu=riwayat-daftar">
										<i class="ace-icon fa fa-history"></i>
										Riwayat Pendaftaran Kursus
									</a>
								</li>
								<li>
									<a href="index.php?menu=riwayat-pembayaran">
										<i class="ace-icon fa fa-dollar"></i>
										Riwayat Pembayaran Kursus
									</a>
								</li>
								<li>
									<a href="proses-login.php?logout=1">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					<?php } else { ?>
						<li class="light-blue">

							<a href="login.php">
								Login
								<i class="ace-icon fa fa-user"></i>
							</a>
						</li>

					<?php } ?>
				</ul>
			</div>

			<nav role="navigation" class="navbar-menu pull-left collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li>
						<a href="?menu=home">Home</a>
					</li>
					<li>
						<a href="?menu=paket">Paket Kursus</a>
					</li>
					<li>
						<a href="?menu=daftar">Daftar Kursus</a>
					</li>
				</ul>
			</nav>
		</div><!-- /.navbar-container -->
	</div>

	<div class="main-container ace-save-state" id="main-container" style="min-height: 100vh; height:100vh">
		<div id="notification"></div>

		<?php
		$menu = isset($_GET['menu']) ? $_GET['menu'] : "";

		switch ($menu) {
			case "home":
				include("home.php");
				break;
			case "paket":
				include("paket.php");
				break;
			case "jadwal":
				include("jadwal.php");
				break;
			case "form-jadwal":
				include("form-jadwal.php");
				break;
			case "gallery":
				include("gallery.php");
				break;
			case "daftar":
				include("daftar.php");
				break;
			case "konfirmasi-daftar":
				include("konfirmasi-daftar.php");
				break;
			case "invoice":
				include("invoice.php");
				break;
			case "konfirmasi":
				include("form-konfirmasi.php");
				break;
			case "riwayat-daftar":
				include('riwayat-daftar.php');
				break;
			case "riwayat-pembayaran":
				include('riwayat-pembayaran.php');
				break;
			case "pembayaran":
				include('pembayaran.php');
				break;
			default:
				include("home.php");
				break;
		}
		?>
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-6 footerleft ">
						<div class="logofooter"> BBC-English Training Specialist CIKAMPEK </div>
						<p>Lembaga kursus Build Better Communication-English Training Specialist (BBC-ETS) CIKAMPEK</p>
						<p><i class="fa fa-map-pin"></i>Jl. Ahmad Yani No.11 Cikampek</p>
					</div>
					<div class="col-md-2 col-sm-6 paddingtop-bottom">
						<h6 class="heading7">GENERAL LINKS</h6>
						<ul class="footer-ul">
							<li>
								<a href="?menu=home">Home</a>
							</li>
							<li>
								<a href="?menu=paket">Paket Kursus</a>
							</li>
							<li>
								<a href="?menu=daftar">Daftar Kursus</a>
							</li>
						</ul>
					</div>
					<div class="col-md-3 col-sm-6 paddingtop-bottom">
					</div>
					<div class="col-md-3 col-sm-6 paddingtop-bottom">
						<div class="fb-page" data-href="https://www.facebook.com/facebook" data-tabs="timeline" data-height="300" data-small-header="false" style="margin-bottom:15px;" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">

						</div>
					</div>
				</div>
			</div>
	</div>
	</footer>
	<!--footer start from here-->

	<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
		<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
	</a>
	</div><!-- /.main-container -->

	<!-- basic scripts -->

	<!--[if !IE]> -->
	<script src="assets/js/jquery-2.1.4.min.js"></script>

	<script>
		var refreshId = setInterval(function() {
			$('#notification').load('notification.php');
		}, 1000);
	</script>
	<!-- <![endif]-->

	<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
	<script type="text/javascript">
		if ('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
	</script>
	<script src="assets/js/bootstrap.min.js"></script>

	<!-- page specific plugin scripts -->

	<!-- ace scripts -->
	<script src="assets/js/ace-elements.min.js"></script>
	<script src="assets/js/ace.min.js"></script>

	<!-- inline scripts related to this page -->
	<script type="text/javascript">
		jQuery(function($) {
			var $sidebar = $('.sidebar').eq(0);
			if (!$sidebar.hasClass('h-sidebar')) return;

			$(document).on('settings.ace.top_menu', function(ev, event_name, fixed) {
				if (event_name !== 'sidebar_fixed') return;

				var sidebar = $sidebar.get(0);
				var $window = $(window);

				//return if sidebar is not fixed or in mobile view mode
				var sidebar_vars = $sidebar.ace_sidebar('vars');
				if (!fixed || (sidebar_vars['mobile_view'] || sidebar_vars['collapsible'])) {
					$sidebar.removeClass('lower-highlight');
					//restore original, default marginTop
					sidebar.style.marginTop = '';

					$window.off('scroll.ace.top_menu')
					return;
				}


				var done = false;
				$window.on('scroll.ace.top_menu', function(e) {

					var scroll = $window.scrollTop();
					scroll = parseInt(scroll / 4); //move the menu up 1px for every 4px of document scrolling
					if (scroll > 17) scroll = 17;


					if (scroll > 16) {
						if (!done) {
							$sidebar.addClass('lower-highlight');
							done = true;
						}
					} else {
						if (done) {
							$sidebar.removeClass('lower-highlight');
							done = false;
						}
					}

					sidebar.style['marginTop'] = (17 - scroll) + 'px';
				}).triggerHandler('scroll.ace.top_menu');

			}).triggerHandler('settings.ace.top_menu', ['sidebar_fixed', $sidebar.hasClass('sidebar-fixed')]);

			$(window).on('resize.ace.top_menu', function() {
				$(document).triggerHandler('settings.ace.top_menu', ['sidebar_fixed', $sidebar.hasClass('sidebar-fixed')]);
			});


		});
	</script>



</body>

</html>