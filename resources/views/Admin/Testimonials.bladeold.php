
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
								<form class="form-horizontal" id="upload_form" enctype="multipart/form-data">
									<div class="form-group"> 
										<label for="inputText" class="col-sm-2 control-label">Title:</label> 
										<div class="col-sm-9"> 
										<input type="Title" class="form-control" id="title" placeholder="Title"  required/> 
										<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
										</div>
									</div>
									<div class="form-group"> 
										<label for="inputText" class="col-sm-2 control-label">Text:</label><div class="col-sm-9"> 
										<textarea class="form-control" rows="5" id="text"  required></textarea></div>
									</div>
									<div class="form-group"> 
										<label for="inputText" class="col-sm-2 control-label">Reference:</label> 
										<div class="col-sm-9"> <input type="text" class="form-control" id="reference" placeholder="Refrence"  required/> 
										</div> 
									</div>
									<div class="form-group"> 
										<label for="inputText" class="col-sm-2 control-label">Personal Image:</label> <input type="file" id="PersonalImg" name="PersonalImg" required/> 
									</div>
									<div class="form-group"> 
										<label for="inputText" class="col-sm-2 control-label">Background Image:</label> <input type="file" id="BackGroundImg" name="BackGroundImg" required/> 
									</div>
									<div class="col-sm-offset-2"> 
										<button type="submit" class="btn btn-primary ">Submit</button>
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
                            <strong>Success!</strong> The  Testimonial has been added..
                        </div>
            </div>

             
				
		</div>


<script type="text/javascript">
	$('#upload_form').submit(function (e) {
	    var data;
	    data = new FormData($('#upload_form')[0]);
	    data.append('PersonalImg', $('#PersonalImg')[0].files[0]);
	    data.append('BackGroundImg', $('#BackGroundImg')[0].files[0]);
	    data.append('_token', $('#token').val());
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
	            $("#SuccessMessage").show();
				
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


