<!DOCTYPE HTML>
<html>
<head>
<title>Zoom</title>
<meta charset="UTF-8">

<meta name="csrf-token" content="{{ csrf_token() }}">

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/bootstrap.min.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<link rel="icon" href="favicon.ico" type="image/x-icon" >
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
 <!-- js-->
<script src="js/jquery-1.11.1.min.js"></script>
 
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<!--//webfonts--> 
<!-- Metis Menu -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<link href="css/custom.css" rel="stylesheet">
 
 <!-- for Alert And Confirm msg -->

<link href="css/jquery-confirm.css" rel="stylesheet"> 
<script src="js/jquery-confirm.js"></script>

<!-- Magnific Popup core CSS file for show testimonials page -->
<link rel="stylesheet" href="css/Magnific-Popup/magnific-popup.css">

<!-- Magnific Popup core JS file for show testimonials page -->
<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->

<script src="css/Magnific-Popup/jquery.magnific-popup.min.js"></script>
<script src="css/Magnific-Popup/jquery.magnific-popup.js"></script>

<script src="js/MyNotification.js"></script>


<!--//Metis Menu -->
</head> 
<body class="cbp-spmenu-push">
	<div class="main-content">
		<!--left-fixed -navigation-->
		<div class="sidebar" role="navigation">
            <div class="navbar-collapse">
				<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right dev-page-sidebar mCustomScrollbar _mCS_1 mCS-autoHide mCS_no_scrollbar" id="cbp-spmenu-s1">
					<div class="scrollbar scrollbar1">
						<ul class="nav" id="side-menu">
							<li>
								<a href="home" class="active"><i class="fa fa-home nav_icon"></i>Home</a>
							</li>
							<li>
								<a href="Services"><i class="fa fa-cogs nav_icon"></i>Services</a>
								
								<!-- /nav-second-level -->
							</li>
							<li>
								<a href="Testimonials"><i class="fa fa-book nav_icon"></i>Testimonials <span class="fa arrow"></span></a>
								
								<!-- /nav-second-level -->
								<ul class="nav nav-second-level collapse">
									<li>
								    	<a href="Testimonials"><span class="fa fa-plus nav_icon"> </span> Add</a>
 
								    	
							        </li>
									<li>
								    	<a href="ShowTestimonials"><span class="fa fa-eye nav_icon" aria-hidden="true"> </span> Show & Edit</a>
							        </li>
							        
									
								</ul>
							</li>
							
							
							<li>
								<a href="AboutUs">    <i class="fa fa-file-text-o nav_icon"> </i>About Us</a>
								 
								
								<!-- /nav-second-level -->
							</li>
							
							<li>
								<a href="ContactUs"><i class="fa fa-envelope nav_icon"></i>Contact Us Message</a>
								
							</li>
							
							<li>
								<!-- <a href="SignUp"><i class="fa fa-user nav_icon" aria-hidden="true"></i>Add new Admin</a> -->
								<a href="UpdateAccount"><i class="fa fa-user nav_icon" aria-hidden="true"></i>My Account</a>
							</li>
							
						</ul>
					</div>
					<!-- //sidebar-collapse -->
				</nav>
			</div>
		</div>
		<!--left-fixed -navigation-->
		<!-- header-starts -->
		<div class="sticky-header header-section ">
			<div class="header-left">
				<!--logo -->
				<div class="logo">
					<a href="home">
						<ul>	
							<!-- <li><img src="#" alt="" /></li>-->
							<li><h1>Zoom</h1></li>
							<div class="clearfix"> </div>
						</ul>
					</a>
				</div>

				<!--//logo-->
                <?php
					use Zoom\Contact as Contact;
					$Contact   = Contact::where('status', '=', 1)->get();
					$NumberMsg =count($Contact);
				?> 
				<!--notifications -->	
				<div class="header-right header-right-grid">
					<div class="profile_details_left"><!--notifications of menu start -->
						<ul class="nofitications-dropdown">
							<li class="dropdown head-dpdn">
							    @if($NumberMsg!=0)
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" id="ANotification"><i class="fa fa-envelope"></i><span class="badge">{{$NumberMsg}}</span></a>
								@else
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" ><i class="fa fa-envelope"></i> </a>
								@endif

								<ul class="dropdown-menu anti-dropdown-menu">
									<li>
										<div class="notification_header">
											<h3>You have {{$NumberMsg}} new messages</h3>
										</div>
									</li>
									@foreach($Contact as  $Contact)
									<li>
									<!--<a href="#"> -->
									   <div class="user_img"><img src="images/3.png" alt=""></div>
									   <div class="notification_desc">
										<p>From: {{$Contact->LastName}} {{$Contact->FirstName}} </p>
										
										</div>
									   <div class="clearfix"></div>	
									<!--</a>-->
									</li>
									 
									@endforeach

									<li>
										<div class="notification_bottom">
											<a href="ContactUs">See all messages</a>
										</div> 
									</li>
								</ul>
							</li> 
						</ul>
						<div class="clearfix"> </div>
					</div>
				</div>
				<!-- //notifications -->	
				

				<div class="clearfix"> </div>
			</div>
		
			<div class="header-right">
				
				<!--notification menu end -->
				<div class="profile_details">		
					<ul>
						<li class="dropdown profile_details_drop">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<div class="profile_img">	
									<span class="prfil-img"><h5>Admin Panel</h5></span> 
									<div class="clearfix"></div>	
								</div>	
							</a>
							<ul class="dropdown-menu drp-mnu">
								
								<li> <a href="logout"><i class="fa fa-sign-out"></i> Logout</a> </li>
							</ul>
						</li>
					</ul>
				</div>
				<!--toggle button start-->
				<button id="showLeftPush"><i class="fa fa-bars"></i></button>
				<!--toggle button end-->
				
				<div class="clearfix"> </div>				
			</div>
			<div class="clearfix"> </div>	
		</div>
		<!-- //header-ends -->
		<div class="container">
		<div id="page-wrapper">
			<div class="main-page">
			
			@yield('content')	

			</div> 
			</div>
		</div>
			
		
		<!-- Bootstrap Core JavaScript --> 
		
        <script type="text/javascript" src="js/bootstrap.min.js"></script>         
		
		<!--scrolling js-->
		<script src="js/jquery.nicescroll.js"></script>
		<script src="js/scripts.js"></script>
		<!--//scrolling js-->
		<script src="js/classie.js"></script>
		<script>
			var menuLeft = document.getElementById( 'cbp-spmenu-s1' ),
				showLeftPush = document.getElementById( 'showLeftPush' ),
				body = document.body;
				
			showLeftPush.onclick = function() {
				classie.toggle( this, 'active' );
				classie.toggle( body, 'cbp-spmenu-push-toright' );
				classie.toggle( menuLeft, 'cbp-spmenu-open' );
				disableOther( 'showLeftPush' );
			};
			

			function disableOther( button ) {
				if( button !== 'showLeftPush' ) {
					classie.toggle( showLeftPush, 'disabled' );
				}
			}
		</script>
	<!-- Bootstrap Core JavaScript --> 
	
	</body>
			
</html>
			