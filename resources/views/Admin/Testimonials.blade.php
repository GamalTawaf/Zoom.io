
@extends ('Admin/MasterAdmin')

@section('content')
		<div class="grids">
			<div class="panel panel-widget forms-panel">
				<div class="forms">
					<div class=" form-grids form-grids-right">
						<div class="widget-shadow " data-example-id="basic-forms"> 
							<div class="form-title">
								<h4>Add a Testimonial:</h4>
							</div> 
							<div class="form-body">
								{!! Form::open(['id' => 'uploadForm','class' => 'form-horizontal','files' => true]) !!}  	
									<div class="form-group"> 
										{!! Form::label('title', 'Title:',['class'=>'col-sm-2 control-label required-field']) !!}
										<div class="col-sm-9"> 
										{!!Form::text('Title','',['class'=>'form-control','id'=>'title','placeholder'=>'Title','required']) !!}
										</div>
									</div>
									<div class="form-group"> 
										{!! Form::label('text', 'Text:',['class'=>'col-sm-2 control-label required-field']) !!}
										<div class="col-sm-9"> 
										{!!Form::textarea('text','',['class'=>'form-control','id'=>'text','rows'=>'5','placeholder'=>'Add here something Impressive','required']) !!}
									    </div>
									</div>
									<div class="form-group"> 
										{!! Form::label('reference', 'Reference:',['class'=>'col-sm-2 control-label required-field']) !!} 
										<div class="col-sm-9"> 
										{!!Form::text('Reference','',['class'=>'form-control','id'=>'reference','placeholder'=>'Reference','required']) !!}
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
									

									<div class="col-sm-offset-2"> 
										{!! Form::Submit('Submit',['class'=>'btn btn-primary']) !!}
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
                            <strong>Success!</strong> The  Testimonial has been added..
                        </div>
            </div>

            <div id="ErrorMessage" style="display: none;">            
                    <div class="alert alert-danger alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Error!</strong> Sorry something went wrong..
                    </div>
            </div>

             
				
		</div>


<script type="text/javascript">
	$('#uploadForm').submit(function (e) {
	    var data;
	    data = new FormData($('#uploadForm')[0]);
	    data.append('img1', $('#img1')[0].files[0]);
	    data.append('img2', $('#img2')[0].files[0]);
	    data.append('img3', $('#img3')[0].files[0]);
	    data.append('img4', $('#img4')[0].files[0]);
	    data.append('_token', $('meta[name="csrf-token"]').attr('content'));
	    data.append('title', $('#title').val());
	    data.append('text', $('#text').val());
	    data.append('reference', $('#reference').val());
	    $.ajax({
	        url: 'upload',
	        data: data,
	        type: 'POST',
	        processData: false,
	        contentType: false,
	        cache: false,
	        success: function (data) {
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

	$(document).ready(function(){
		e.preventDefault(); 
		$(window).keydown(function(event){
       		if(event.keyCode == 13) {
      			event.preventDefault();
      			return false;
    	    }
        });
	});		

</script>

 
@endsection


