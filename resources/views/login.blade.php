<!DOCTYPE html>
<html lang="en">
<head>
<title>Zoom Login</title>
	<!-- Meta tags -->
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Jolly Login Form Responsive Widget, Audio and Video players, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- Meta tags -->


<!-- font-awesome icons -->
   <link rel="stylesheet" href="css/font-awesome.min.css" />

<!-- //font-awesome icons -->
<!--stylesheets-->
<link href="UserInterface/css/style.css" rel='stylesheet' type='text/css' media="all">
<!--//style sheet end here-->

<link href="//fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">

</head>
<body>
<!--
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none1;">
-->
	<h1>Login</h1>
    <div class="main-w3">
        <form method="POST" action="auth/login"   >
        {!! csrf_field() !!}
            <h2><span class="fa fa-user t-w3" aria-hidden="true"></span></h2>
            <div class="login-w3ls">
            	<div class="icons">
             
	     	    	<!-- <input type="email" name="email" placeholder="Email" required=""> -->
	     	    	<input type="email" name="email" value="{{ old('email') }}">
	     			<span class="fa fa-user" aria-hidden="true"></span>
                 	<div class="clear"></div> 
	        	</div> 		   
		     	<div class="icons">
				
					<!-- <input type="password" name="password" placeholder="Password" required=""> -->
					<input type="password" name="password" id="password">

					<span class="fa fa-key" aria-hidden="true"></span>
		         	<div class="clear"></div>
				</div>
	     		<div class="btnn">
         			<!--<input type="checkbox" class="checked"><span class="span">Remember me..?</span><br>-->
	          		<button type="submit">Login</button>
	          		<br>
       	      		<!-- <a href="#" class="for" >Forgot password...?</a>  -->
        		</div>	
     		</div>
     	     
   		</form> 
	</div>
	<!-- </div> -->
	</body>
</html>