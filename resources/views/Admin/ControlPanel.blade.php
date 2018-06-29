@extends ('Admin/MasterAdmin')
@section('content')
		<div class="row four-grids"  >

					<div class="col-md-6 ticket-grid">
						<div class="tickets">
							<div class="grid-left">
								<div class="book-icon">
									<i class="fa fa-cogs"></i>
								</div>
							</div>
							<div class="grid-right">
								<a href="Services"><i class="nav_icon"></i><h1>Services</h1></a>
								<p></p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>

					<div class="col-md-6 ticket-grid">
						<div class="tickets">
							<div class="grid-left">
								<div class="book-icon">
									<i class="fa fa-book"></i>
								</div>
							</div>
							<div class="grid-right">
								<a href="Testimonials"> <h2>New Testimonial</h2></a>
								<span></span>
								<p></p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
					</div>
            <div class="row four-grids"   >
					
					<div class="col-md-6 ticket-grid">
						<div class="tickets">
							<div class="grid-left">
								<div class="book-icon">
									<i class="fa fa-eye"></i>
								</div>
							</div>
							<div class="grid-right">
								<a href="ShowTestimonials"> <h2>Show Testimonials</h2></a>
								<p></p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>

					
					<div class="col-md-6 ticket-grid">
						<div class="tickets">
							<div class="grid-left">
								<div class="book-icon">
									<i class="fa fa-file-text-o"></i>
								</div>
							</div>
							<div class="grid-right">
								<a href="AboutUs">    <i class="nav_icon"> </i><h2>About Us</h2></a>
								<p></p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
				 <div class="row four-grids"   >
				 
					<div class="col-md-6 ticket-grid">
						<div class="tickets">
							<div class="grid-left">
								<div class="book-icon">
									<i class="fa fa-envelope"></i>
								</div>
							</div>
							<div class="grid-right">
								<a href="ContactUs"><i class="nav_icon"></i><h2>Contact Us</h2></a>
								<p></p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
					<div class="col-md-6 ticket-grid">
						<div class="tickets">
							<div class="grid-left">
								<div class="book-icon">
									<i class="fa fa-user"></i>
								</div>
							</div>
							<div class="grid-right">
								<a href="UpdateAccount"><i class="nav_icon" aria-hidden="true"></i><h2>My Account</h2></a>
								<p></p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>

					<div class="clearfix"> </div>
				</div>
@endsection

