<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> 
<html lang="en"> <!--<![endif]-->  
<head>
    <title>Sama Security Services</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
	    $services_str = '';
	    foreach($services as $service) {
	    	if(strlen($services_str) > 0) {
	    		$services_str = $services_str . ', ' . ucfirst($service->name);
	    	} else {
	    		$services_str = ucfirst($service->name);	    		
	    	}
	    }
    ?>
    <meta name="description" content="{{$services_str}}">
    <meta name="author" content="Ebrahim">    
    <link rel="shortcut icon" href="favicon.ico">  
    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'> 
    <!-- Global CSS -->
	<link rel="stylesheet" href="UserInterface/css/flexslider.css" type="text/css" media="screen"/>

    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    

    <!-- Plugins CSS --> 	
    <link href="css/font-awesome.css" rel="stylesheet"> 
    <link rel="stylesheet" href="UserInterface/plugins/prism/prism.css">
    <!-- Theme CSS --> 	
	<link href="UserInterface/css/UserInterface.css" rel="stylesheet" type="text/css" media="all" />
    <link id="theme-style" rel="stylesheet" href="UserInterface/css/UserInterface1.css">
	<link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    
</head> 

<body data-spy="scroll">
    
    <!-- ******HEADER****** --> 
    <header id="header" class="header">  
        <div class="container">            
            <h1 class="logo pull-left">
                <a class="scrollto" href="#promo">
                    <span class="logo-title">Sama Security Services</span>
                </a>
            </h1><!--//logo-->

            <nav id="main-nav" class="main-nav navbar-right" role="navigation">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button><!--//nav-toggle-->
                </div><!--//navbar-header-->            
                <div class="navbar-collapse collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="nav-item"><a class="scrollto" href="#promo">Home</a></li>
                        <li class="nav-item"><a class="scrollto" href="#about">About Us</a></li>
                        <li class="nav-item"><a class="scrollto" href="#docs">Testimonials</a></li>                        
                        <li class="nav-item"><a class="scrollto" href="#contact">Contact</a></li>
					</ul><!--//nav-->
                </div><!--//navabr-collapse-->
            </nav><!--//main-nav-->
        </div>
    </header><!--//header-->
 
    <!-- ******PROMO****** -->
    <section id="promo" class="promo section offset-header">
        <div class="container text-center">
            <p class="intro">Over 10 years of Security Systems Services and Thousands of Satisfied Customers. 
            <img src="UserInterface/images/CCTV-Camera-icon.png" class="img-png" />
        </div><!--//container-->
        	<br>
        </div><!--//container-->
    </section><!--//promo-->
    
    <!-- ******ABOUT****** -->  
    @if(session()->has('message'))
    <script type="text/javascript">alert("Invalid Email or Password.\n Please try again.");</script>

    @endif

    <section id="about" class="about section">
        <div class="container">
		    <div class="col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
	        	<img src="UserInterface/images/whoweare-content.png" alt=" " class="img-responsive" />
	       	</div>
		<div class="col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12">
		<div class=:"text-center">
            <h2 class="title">What do we do?</h2>
			<div class="border-line"></div>
			<p>
		     {{$aboutus->text}} 
			</p>
		   </div>
        </div>
        </div><!--//container-->
    </section><!--//features-->
    <!-- visitors -->
	<div  id="docs" class="docs section" >
		<div class="container">
			<div class="w3layouts_head">
				<h3 class="tittle">Testimonials</h3>
					<div class="border"></div>
				</div>
			</div>
					<?php
					//print_r($Testimonial);
					?>
		<div class="w3layouts_work_grids">
			<section class="slider">
			    	<div class="flexslider">
				    	<ul class="slides">
			     		@foreach ($testimonials as $testimonial)
				     	<li>
					 		<div class="w3layouts_work_grid_left">
								    <?php
							    	$imgArr=explode(",",$testimonial->images);
							    	?>
							    	@foreach ($imgArr as $arrKey => $value)
							    			<img src="uploads/testimonials/{{$value}}" alt=" " class="img-responsive">
							    	@endforeach	
							</div>
							<div class="w3layouts_work_grid_right">
								<h4> {{ $testimonial->title }}     </h4>
								<p>  {{ $testimonial->text }}      </p>
								<h5> {{ $testimonial->reference }} </h5>
								
					 		</div>
							<div class="clearfix"> </div>
						</li>
						@endforeach
					
					    </ul>
	    		    </div>
			</section>
		</div>	
	</div>
  <!-- visitors End-->
    
    
    
    <!-- ******CONTACT****** --> 
    <section id="contact" class="contact section">
            <div class="contact">
                <div class="container">
     	          	<div class="row">
	         			<h2 class="title">CONTACT US</h2>
                	</div>
                <div id="Message" ></div>	
				<div class="row input-container">
					<form action="AddContact" id="ContactForm" method="post">
						<div class="col-md-6 col-sm-12">
							<div class="styled-input wide">
								<input type="text" name="FirstName" required/>
								<label>First Name</label> 
							</div>
						</div>
						<div class="col-md-6 col-sm-12">
							<div class="styled-input wide">
								<input type="text" name="LastName" required/>
								<label>Last Name</label> 
							</div>
						</div>
						<div class="col-md-6 col-sm-12">
							<div class="styled-input wide">
								<input type="text" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Please enter a valid email" required/>
								<label>Email</label>      
							</div>
						</div>
						<div class="col-md-6 col-sm-12">
							<div class="styled-input  wide" style="float:right;">
								<input type="text" name="phone" required/>
								<label>Phone Number</label> 
							</div>
						</div>
						<div class="col-xs-12">
							<div class="styled-input wide">
					 			<select class="field" placeholder="Options" name='serviceId'>
					 				@foreach ($services as $service)
					 					<option  value="{{$service->id}}">{{ucfirst($service->name)}}</option>
					 				@endforeach
					 			</select> 
							</div>
						</div>
						<div class="col-xs-12">
							<div class="styled-input wide">
								<textarea required name="message"></textarea>
								<label>Message</label>
							</div>
						</div>
						<div class="col-xs-12">
	 						<div >
	 							<input class="btn-lrg submit-btn" type="submit" value="Send Message" />
	 						</div>
						</div>
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
					</form>
         		</div>
            </div><!--//contact-inner-->
        </div><!--//container-->
    </section><!--//contact-->  
      
    <!-- ******FOOTER****** --> 
    <footer class="footer">
        <div class="container text-center">	
          <div class="container">
       
         <div class="row ">
              <div class="col-md-5 col-sm-5 col-xs-12">    
         	<p>Copyright 2017 © EBRAHIM</p>
         	
         </div>
         <div class="col-md-7 col-sm-7 col-xs-12">
             <div class="navbar-collapse collapse">
                    <ul class=" navbar-nav menu list-inline">
                        <!-- <li class="nav-item"><a class="scrollto" href="#promo">Home</a></li> -->  
                    </ul><!--//nav-->
                </div>
               </div>
               </div>
            </div>
           </div><!--//container-->
    </footer><!--//footer-->
     
    <!-- Javascript -->          
    <script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>    
    <script type="text/javascript" src="UserInterface/plugins/jquery.easing.1.3.js"></script>   
    <script type="text/javascript" src="UserInterface/plugins/bootstrap/js/bootstrap.min.js"></script>     
    <script type="text/javascript" src="UserInterface/plugins/jquery-scrollTo/jquery.scrollTo.min.js"></script> 
    <script type="text/javascript" src="UserInterface/js/main.js"></script>  
    
		<!-- start-smoth-scrolling -->
		<!-- flexSlider -->
	<script defer src="UserInterface/js/jquery.flexslider.js"></script>
	<script type="text/javascript">
	$(window).load(function(){
		$('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
				$('body').removeClass('loading');
				}
			});
		});
	</script>
	<script type="text/javascript">
	$(document).ready(function(){ 
		$('#ContactForm').on('submit', function(e) {
			e.preventDefault(); 
			var data=$(this).serialize();
			//alert(data);
			$.ajax({
           		type: "POST",
           		url: 'CreateContact',
           		data:data,
           		success: function( msg ) {
           			//console.log(msg);
           			//alert(msg);
           			$("#Message").html(msg);
           			$('#ContactForm')[0].reset();			
           		} 
           	}); 
				
		});
		 		
	});
</script> 
</body>
</html> 

