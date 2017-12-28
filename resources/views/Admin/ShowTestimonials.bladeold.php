
@extends ('Admin/MasterAdmin')
@section('content')

		<div class="grids" id="formUp">
		
			<div class="panel panel-widget forms-panel" style="display: none;">
				<div class="forms" >
					<div class=" form-grids form-grids-right" >
						<div class="widget-shadow " data-example-id="basic-forms" > 
							<div class="form-title">
								<h4>Update a Testimonial:</h4>
							</div> 
							<div class="form-body">
								<form class="form-horizontal" id="upload_form" enctype="multipart/form-data">
									<div class="form-group"> 
										<label for="inputText" class="col-sm-2 control-label">Title:</label> 
										<div class="col-sm-9"> 
											<div class='titleUpdate'>
												<input type="Title" class="form-control" id="title" placeholder="Title"  required/> 
											</div>	
										<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
										</div>
									</div>
									<div class="form-group"> 
										<label for="inputText" class="col-sm-2 control-label">Text:</label><div class="col-sm-9"> 
										<div class='textUpdate'>
											<textarea class="form-control" rows="5" id="text"  required></textarea></div>
										</div>	
									</div>
									<div class="form-group" > 
										<label for="inputText" class="col-sm-2 control-label">Reference:</label> 
										<div class="col-sm-9"> 
										<div class='referenceUpdate'>
											<input type="text" class="form-control" id="reference" placeholder="Refrence"  required/> 
										</div>
										</div> 
									</div>
									<div class="form-group"> 
										<label for="inputText" class="col-sm-2 control-label">Personal Image:</label> <input type="file" id="PersonalImg" name="PersonalImg" required/> 
									</div>
									<div class="form-group"> 
										<label for="inputText" class="col-sm-2 control-label">Background Image:</label> <input type="file" id="BackGroundImg" name="BackGroundImg" required/> 
									</div>
									<div class="col-sm-offset-2" > 
										<button type="submit" class="btn btn-default">Submit</button> 
									</div>
									<div class='idUpdate'>
									<input type="hidden" id="id" name="id" required/>  
									</div>
								</form> 
							</div>
						</div> 
					</div>
				</div>	
			</div>
			<div id="SuccessMessage" style="display: none;">            
                        <div class="alert alert-success alert-dismissable fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Success!</strong> The  Testimonial has been updated..
                        </div>
            </div>


					<div class="panel panel-widget" id="TableShowDiv">
						<div  >
							<h4>Testimonials Table:</h4>
							<table class="table table-hover" id="ShowTableTestimonial"> <thead> <tr><th>  Title</th><th>  Text</th> <th>  Reference</th><th>  Personal Image</th><th>  Background Image</th><th>Update</th> <th>Delet</th> </tr> </thead> 
							<tbody> 

							@foreach($Testimonial as $data)
							    <form action="EditService" method="post" id="formid_{{$data->id}}" class="form-body">
							    <div class="popup-gallery">
							    <tr id="myTableRow_{{$data->id}}"> 
							     
							    	<td scope="row" >
							    		<b> {{$data->title}} </b>	
							    		
							    		
							    	</td>
							    	<td>
							    		{{$data->text}}	
							    	</td>
							    	<td>
							    		{{$data->reference}}	
							    	</td>
							    	<td>
							    	<a class="image-popup-vertical-fit" href="uploads/testimonials/{{$data->PersonalImg}}" >
									<img src="uploads/testimonials/{{$data->PersonalImg}}" width="65" height="100">
									</a>	

							    	</td>		
							    	<td>	
							    		<a class="image-popup-vertical-fit" href="uploads/testimonials/{{$data->BackGroundImg}}"><img src="uploads/testimonials/{{$data->BackGroundImg}}" width= "70"  height="100" ></a>
							    	</td>

							    	<td>
							    			<a href="#formUp" id="PenUpdt" >
							    			<i class="fa fa-pencil" id="{{$data->id}}" ></i>
							    			</a>
							    	</td> 
							    	<td> <a href="#"><i  class="fa fa-trash-o" id="delete_{{$data->id}}"></i></a></td> 
							    
							    </tr> 
							    </div>
							    <i class="fa fa-floppy-o" aria-hidden="true" style="display: none;" id="save_{{$data->id}}"></i>
							    			
							    <input type="hidden" name="id" id="id_{{$data->id}}" value="{{$data->id}}">
							    <input type="hidden" name="_token" id="token_{{$data->id}}"  value="{{ csrf_token() }}">
							    </form>	
								
							@endforeach




							</tbody> 
							</table>
						</div>
						<div class="clearfix"> </div>
					</div>

					

				</div>	


 

  
<script type="text/javascript">

	$(document).ready(function(){
		//$('.fa-pencil').on('click', function(e) {
		$("#ShowTableTestimonial tbody").on( "click", ".fa-pencil", function(e) {
			e.preventDefault(); 
			$("body, html").animate({ scrollTop: $( $('#PenUpdt').attr('href') ).offset().top}, 600);
			var Id = $(this).attr('id');
			var csrf_token = $('meta[name="csrf-token"]').attr('content');
			var data='Id='+Id+'&_token='+csrf_token;
            $.ajax({
           		type: 'POST',
           		url: 'EditTestimonial',
          		data:data,
           		success: function( msg ) {
           			$('.forms-panel').show();
           			$('.titleUpdate input').val(msg.title);
           			$('.textUpdate textarea').val(msg.text);
           			$('.referenceUpdate input').val(msg.reference);
           			$('.idUpdate input').val(msg.id);
           			$('#TableShowDiv').hide();					
           		}
       		});
		});


		$("#ShowTableTestimonial tbody").on( "click", ".fa-trash-o", function(e) {	
       		e.preventDefault(); 
            var str = $(this).attr('id');
            var id = str.split("_");
            var Id=id[1];
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
			var data='Id='+Id+'&_token='+csrf_token;   				
    		$.confirm({
    			title: 'Confirm!',
    			content: 'Are you sure..',
    			type: 'orange',
    			typeAnimated: true,
    			buttons: {
        			tryAgain: {
            			text: 'Yes',
            			btnClass: 'btn-orange',
            			action: function(){
            				//alert("Yes");
            				
            				$.ajax({
           						type: 'POST',
           						url: 'DeleteTestimonial',
           						data:data,
           						success: function( msg ) {
           							//alert( msg );	
           							if(msg=='Done')
           							$('#myTableRow_'+Id).remove();
           						}
       						});
       						
            			}
        			},
        			close: function () {
        			//alert("Close");
        			}
    			}
			});
       	});


	$('.image-popup-vertical-fit').magnificPopup({
		type: 'image',
		closeOnContentClick: true,
		mainClass: 'mfp-img-mobile',
		image: {
			verticalFit: true
		}
		
	});

	$('.image-popup-fit-width').magnificPopup({
		type: 'image',
		closeOnContentClick: true,
		image: {
			verticalFit: false
		}
	});

	$('.image-popup-no-margins').magnificPopup({
		type: 'image',
		closeOnContentClick: true,
		closeBtnInside: false,
		fixedContentPos: true,
		mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
		image: {
			verticalFit: true
		},
		zoom: {
			enabled: true,
			duration: 300 // don't foget to change the duration also in CSS
		}
	});
	


});


	$('#upload_form').submit(function (e) {
	    var data;
	    data = new FormData($('#upload_form')[0]);
	    data.append('PersonalImg', $('#PersonalImg')[0].files[0]);
	    data.append('BackGroundImg', $('#BackGroundImg')[0].files[0]);
	    data.append('_token', $('#token').val());
	    data.append('title', $('#title').val());
	    data.append('text', $('#text').val());
	    data.append('reference', $('#reference').val());
	    data.append('id', $('#id').val());
	    
	    $.ajax({
	        url: 'uploadupdate',
	        data: data,
	        type: 'POST',
	        processData: false,
	        contentType: false,
	        cache: false,
     		success: function (data) {
	            $("#SuccessMessage").show();
				
	        },
            error: function(data) {
                }, 
    	});

    	e.preventDefault();
	});

</script>

@endsection


