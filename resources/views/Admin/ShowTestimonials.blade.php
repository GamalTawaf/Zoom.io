
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
								
							{!! Form::open(['id' => 'uploadForm','class' => 'form-horizontal','files' => true]) !!}  

								<div class="form-group"> 
									{!! Form::label('title', 'Title:',['class'=>'col-sm-2 control-label required-field']) !!}
										<div class="col-sm-9"> 
											<div class='titleUpdate'>
											{!! Form::text('title','',['class'=>'form-control','id'=>'title','required']) !!} 
											</div>	
										<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
										</div>
								</div>
								<div class="form-group"> 
									{!! Form::label('text', 'Text:',['class'=>'col-sm-2 control-label required-field']) !!}
										<div class="col-sm-9"> 
										<div class='textUpdate'>
											{!! Form::textarea('text','',['class'=>'form-control','rows'=>'5','id'=>'text','required']) !!} 
										</div>
										</div>	
								</div>
								<div class="form-group" > 
									{!! Form::label('reference', 'Reference:',['class'=>'col-sm-2 control-label required-field']) !!}	
										<div class="col-sm-9"> 
										<div class='referenceUpdate'>
											{!! Form::text('reference','',['class'=>'form-control','id'=>'reference','required']) !!} 
										</div>
										</div> 
								</div>
								<div class="form-group"> 
										{!! Form::label('image1', 'Image1:',['class'=>'col-sm-2 control-label required-field']) !!}	
										 
										<input type="file" id="img1" name="img1" class="col-sm-4" required/> 

										{!! Form::label('image3', 'Image3:',['class'=>'col-sm-1 control-label']) !!}	
										 
										<input type="file" id="img3" name="img3" class="col-sm-4" /> 
								</div>

								<div class="form-group"> 
										{!! Form::label('image2', 'Image2:',['class'=>'col-sm-2 control-label required-field']) !!}	
										 <input type="file" id="img2" name="img2" class="col-sm-4" required/> 

										{!! Form::label('image4', 'Image4:',['class'=>'col-sm-1 control-label']) !!}	
										 <input type="file" id="img4" name="img4" class="col-sm-4" /> 
								</div>

								<div class="col-sm-offset-2" > 
									{!! Form::submit('Save',['class'=>'btn btn-primary']) !!}
								</div>
								<div class='idUpdate'>
									<!-- <input type="hidden" id="id" name="id" required/>  -->
									{!! Form::hidden('id','',[ 'id'=>'id','required']) !!} 
								</div>
							{!! Form::close() !!}
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

            <div id="ErrorMessage" style="display: none;">            
                    <div class="alert alert-danger alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Error!</strong> Sorry something went wrong..
                    </div>
            </div>



					<div class="panel panel-widget" id="TableShowDiv">
						<div>
							<h4>Testimonials Table:</h4>
							<table class="table table-hover" id="ShowTableTestimonial"> <thead> <tr><th>  Title</th><th>  Text</th> <th>  Reference</th><th> Images</th><th>Update</th> <th>Delet</th> </tr> </thead> 
							<tbody> 
							
							@foreach($Testimonial as $key => $data)
							     
							    {!! Form::open(['id' => 'formid_'."$data->id",'class' => 'form-body']) !!}    	
								    <div class="popup-gallery">
								    <tr id="myTableRow_{{$data->id}}">  
								    	<td scope="row" > <b> {{$data->title}} </b>	</td>
								    	<td> {{$data->text}}	                    </td>
								    	<td> {{$data->reference}}	                </td>
								    	<td>
									    	<?php $imgArr=explode(",",$data->images); ?>
									    	@foreach ($imgArr as $arrKey => $value)
									    		<a class="image-popup-vertical-fit" href="uploads/testimonials/{{$value}}" >
													<img src="uploads/testimonials/{{$value}}" width="65" height="100">
												</a>
									    	@endforeach	 
								    	</td>		
								    	<td><a href="#formUp" id="PenUpdt" ><i class="fa fa-pencil" id="{{$data->id}}" ></i></a>
								    	</td> 
								    	<td> <a href="#"><i  class="fa fa-trash-o" id="delete_{{$data->id}}"></i></a></td> 
								    </tr> 
								    </div>
								    <i class="fa fa-floppy-o" aria-hidden="true" style="display:none;" id="save_{{$data->id}}"></i>
								    <input type="hidden" name="id" id="id_{{$data->id}}" value="{{$data->id}}">
								    <input type="hidden" name="_token" id="token_{{$data->id}}"  value="{{ csrf_token() }}">
							    {!! Form::close() !!}	
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
           			//$('.referenceUpdate input').val(msg.reference);
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


	$('#uploadForm').submit(function (e) {
	    var data;
	    data = new FormData($('#uploadForm')[0]);
	    data.append('img1', $('#img1')[0].files[0]);
	    data.append('img2', $('#img2')[0].files[0]);
	    data.append('img3', $('#img3')[0].files[0]);
	    data.append('img4', $('#img4')[0].files[0]);
	    data.append('_token', $('#token').val());
	    data.append('title', $('#title').val());
	    data.append('text', $('#text').val());
	    data.append('reference', $('#reference').val());
	    data.append('id', $('#id').val());
	    alert($('#reference').val());
	    $.ajax({
	        url: 'uploadupdate',
	        data: data,
	        type: 'POST',
	        processData: false,
	        contentType: false,
	        cache: false,
     		success: function (data) { console.log(data);
     			if (data=='Done') {
	        		$("#SuccessMessage").show();
	        		$("#ErrorMessage").hide();
	        	}
	        	else {
	        		$("#SuccessMessage").hide();
	        		$("#ErrorMessage").show();
				}
				
	        },
            error: function(data) {
            	}, 
    	});

    	e.preventDefault();
	});

</script>

@endsection


