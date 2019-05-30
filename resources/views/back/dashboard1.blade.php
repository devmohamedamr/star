<!doctype html>
<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="zxx"> <![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8" lang="zxx"> <![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9" lang="zxx"> <![endif]-->
<!--[if gt IE 8]><!-->	<html class="no-js" lang="zxx"> <!--<![endif]-->

<!-- Mirrored from wahabali.com/work/listingstars/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 17 Mar 2019 20:57:28 GMT -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Star </title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="favicon.png">
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/bootstrap-slider.css')}}">
	<link rel="stylesheet" href="{{asset('css/normalize.css')}}">
	<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/icomoon.css')}}">
	<link rel="stylesheet" href="{{asset('css/chosen.css')}}">
	<link rel="stylesheet" href="{{asset('css/prettyPhoto.css')}}">
	<link rel="stylesheet" href="{{asset('css/scrollbar.css')}}">
	<link rel="stylesheet" href="{{asset('css/morris.css')}}">
	<link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}">
	<link rel="stylesheet" href="{{asset('css/YouTubePopUp.css')}}">
	<link rel="stylesheet" href="{{asset('css/auto-complete.css')}}">
	<link rel="stylesheet" href="{{asset('css/jquery.navhideshow.css')}}">
	<link rel="stylesheet" href="{{asset('css/transitions.css')}}">
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
	<link rel="stylesheet" href="{{asset('css/dbstyle.css')}}">
	<link rel="stylesheet" href="{{asset('css/color.css')}}">
	<link rel="stylesheet" href="{{asset('css/responsive.css')}}">
	<link rel="stylesheet" href="{{asset('css/dbresponsive.css')}}">
	<script src="{{asset('js/vendor/modernizr-2.8.3-respond-1.4.2.min.js')}}"></script>
</head>
<body>
	<!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<!--************************************
			Preloader Start
	*************************************-->
	<div class="preloader-outer">
		<div class="pin"></div>
		<div class="pulse"></div>
	</div>
	<!--************************************
			Preloader End
	*************************************-->
	<!--************************************
			Wrapper Start
	*************************************-->
	<div id="listar-wrapper" class="listar-wrapper listar-haslayout">
		<!--************************************
				Header Start
		*************************************-->
		<header id="listar-dashboardheader" class="listar-dashboardheader listar-haslayout">
			<div class="cd-auto-hide-header listar-haslayout">
				<div class="container-fluid">
					<div class="row">
					<strong class="listar-logo"><a href="index-2.html"><img src="{{asset('images/logo.png')}}" alt="company logo here"></a></strong>
						<nav class="listar-addnav">
							<ul>
								<li>
									<div class="dropdown listar-dropdown">
										<a class="listar-userlogin listar-btnuserlogin" href="javascript:void(0);" id="listar-dropdownuser" data-toggle="dropdown">
											<span><img src="images/author/img-10.jpg" alt="image description"></span>
											<em>John Parker</em>
											<i class="fa fa-angle-down"></i>
										</a>
										<div class="dropdown-menu listar-dropdownmen" aria-labelledby="listar-dropdownuser">
											<ul>
												<li class="listar-active">
													<a href="">
														<i class="icon-speedometer2"></i>
														<span>Categories</span>
													</a>
												</li>
												<li class="listar-active">
													<a href="dashboard.html">
														<i class="icon-speedometer2"></i>
														<span>Hotels</span>
													</a>
												</li>
													<li class="listar-active">
													<a href="dashboard.html">
														<i class="glyphicon glyphicon-plane"></i>
														<span>Airlines</span>
													</a>
												</li>
													<li class="listar-active">
													<a href="dashboard.html">
														<i class="icon-speedometer2"></i>
														<span>Tourism Programs</span>
													</a>
												</li>
													<li class="listar-active">
													<a href="dashboard.html">
														<i class="icon-speedometer2"></i>
														<span>Ships</span>
													</a>
												</li>
												</li>
													<li class="listar-active">
													<a href="dashboard.html">
														<i class="icon-speedometer2"></i>
														<span>Car Rental</span>
													</a>
												</li>
											</ul>
										</div>
									</div>
								</li>
								<li>
									<a class="listar-btn listar-btngreen" href="dashboardaddlisting.html">
										<i class="icon-plus"></i>
										<span>Add Listing</span>
									</a>
								</li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
			<div id="listar-sidebarwrapper" class="listar-sidebarwrapper">
			<strong class="listar-logo"><a href="index-2.html"><img src="{{asset('images/logo.png')}}" alt="company logo here"></a></strong>
				<span id="listar-btnmenutoggle" class="listar-btnmenutoggle"><i class="fa fa-angle-left"></i></span>
				<div id="listar-verticalscrollbar" class="listar-verticalscrollbar">
					<nav id="listar-navdashboard" class="listar-navdashboard">
						<div class="listar-menutitle"><span>Basic Data </span></div>
						<ul>
							<li class="listar-active">
								<a href="{{route('category.index')}}">
									<i class="icon-speedometer2"></i>
									<span>Categories</span>
								</a>
							</li>
							<li class="listar-active">
								<a href="dashboard.html">
									<i class="icon-speedometer2"></i>
									<span>Hotels</span>
								</a>
							</li>
								<li class="listar-active">
								<a href="dashboard.html">
									<i class="glyphicon glyphicon-plane"></i>
									<span>Airlines</span>
								</a>
							</li>
								<li class="listar-active">
								<a href="dashboard.html">
									<i class="icon-speedometer2"></i>
									<span>Tourism Programs</span>
								</a>
							</li>
								<li class="listar-active">
								<a href="dashboard.html">
									<i class="icon-speedometer2"></i>
									<span>Ships</span>
								</a>
							</li>
							</li>
								<li class="listar-active">
								<a href="dashboard.html">
									<i class="icon-speedometer2"></i>
									<span>Car Rental</span>
								</a>
							</li>

						
						</ul>
						<div class="listar-menutitle listar-menutitleaccount"><span>Account</span></div>
						<ul>
							<li>
								<a href="dashboardmyprofile.html">
									<i class="icon-lock6"></i>
									<span>My Profile</span>
								</a>
							</li>
							<!-- <li>
								<a href="dashboard-profile-setting.html">
									<i class="icon-user4"></i>
									<span>Logout</span>
								</a>
							</li> -->
						</ul>
					</nav>
				</div>
			</div>
		</header>
		<!--************************************
				Header End
		*************************************-->
		<!--************************************
				Main Start
		*************************************-->
		<main id="listar-main" class="listar-main listar-haslayout">
			<!--************************************
					Dashboard Banner Start
			*************************************-->

				<ol class="listar-breadcrumb">
					<li><a href="javascript:void(0);">Home</a></li>
					<li class="listar-active">Dashboard</li>
				</ol>
			<div class="listar-dashboardbanner">


			
			@yield('content')

			</div>

			
			<!--************************************
					Dashboard Banner End
			*************************************-->	
		</main>
		<!--************************************
					Main End
		*************************************-->
		<!--************************************
					Footer Start
		*************************************-->
		<div class='clearfix'></div>
		<div class='clearfix'></div>
		<div class='clearfix'></div>
	<footer id="listar-footer" class="listar-footer listar-haslayout navbar navbar-fixed-bottom"  >
			<div class="listar-footerbar">
				<div class="container-fluid">
					<div class="row">
						<span class="listar-copyright">Copyright &copy; 2018 Listingstar. All rights reserved.</span>
					</div>
				</div>
			</div>
		</footer>
		
		<!--************************************
					Footer End
		*************************************-->
		
		
	</div>
	
	<!--************************************
	
	
				Wrapper End
	*************************************-->
	<script src="{{asset('js/vendor/jquery-library.js')}}"></script>
	<script src="{{asset('js/vendor/bootstrap.min.js')}}"></script>
	<script src="{{asset('js/mapclustering/data.json')}}"></script>
	<script src="https://maps.google.com/maps/api/js?key=AIzaSyCR-KEWAVCn52mSdeVeTqZjtqbmVJyfSus&amp;language=en"></script>
	<script src="js/tinymce/tinymce.min4bb5.js?apiKey=4cuu2crphif3fuls3yb1pe4qrun9pkq99vltezv2lv6sogci"></script>
	<script src="../../../www.gstatic.com/charts/loader.js"></script>
	<script src="{{asset('js/mapclustering/markerclusterer.min.js')}}"></script>
	<script src="{{asset('js/mapclustering/infobox.js')}}"></script>
	<script src="{{asset('js/mapclustering/map.js')}}"></script>
	<script src="{{asset('js/ResizeSensor.js.js')}}"></script>
	<script src="{{asset('js/jquery.sticky-sidebar.js')}}"></script>
	<script src="{{asset('js/YouTubePopUp.jquery.js')}}"></script>
	<script src="{{asset('js/jquery.navhideshow.js')}}"></script>
	<script src="{{asset('js/backgroundstretch.js')}}"></script>
	<script src="{{asset('js/jquery.sticky-kit.js')}}"></script>
	<script src="{{asset('js/bootstrap-slider.js')}}"></script>
	<script src="{{asset('js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('js/jquery.vide.min.js')}}"></script>
	<script src="{{asset('JS/auto-complete.html')}}"></script>
	<script src="{{asset('js/chosen.jquery.js')}}"></script>
	<script src="{{asset('js/scrollbar.min.js')}}"></script>
	<script src="{{asset('js/isotope.pkgd.js')}}"></script>
	<script src="{{asset('js/jquery.steps.js')}}"></script>
	<script src="{{asset('js/prettyPhoto.js')}}"></script>
	<script src="{{asset('js/raphael-min.js')}}"></script>
	<script src="{{asset('js/parallax.js')}}"></script>
	<script src="{{asset('js/sortable.js')}}"></script>
	<script src="{{asset('js/countTo.js')}}"></script>
	<script src="{{asset('js/appear.js')}}"></script>
	<script src="{{asset('js/gmap3.js')}}"></script>
	<script src="{{asset('js/dev_themefunction.js')}}"></script>
</body>

<!-- Mirrored from wahabali.com/work/listingstars/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 17 Mar 2019 20:57:32 GMT -->
</html>