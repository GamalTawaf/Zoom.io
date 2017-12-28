
@extends ('Admin/MasterAdmin')
@section('content')
	<div class="grids">
		<div class="panel panel-widget forms-panel">
			<div class="forms">
				<div class=" form-grids form-grids-right">
					<div class="widget-shadow " data-example-id="basic-forms"> 
						<div class="form-title">
							<h4>Add A Note About Your Job:</h4>
						</div> 
						<div class="form-body">
							{!! Form::open(['id' => 'aboutUsForm','class' => 'form-horizontal']) !!}	
								<div class="form-group"> 
									{!! Form::label('Text', 'Text:',['class'=>'col-sm-2 control-label required-field']) !!}
									<div class="col-sm-9"> 
										{!! Form::textarea('text', "$aboutUs->text",['class'=>'form-control','rows'=>'10', 'id'=>'text']) !!}
									</div>	 
								</div>
								<div class="col-sm-offset-2"> 
									{!! Form::submit('Save',['class'=>'btn btn-primary']) !!}
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
                <strong>Success!</strong> Updated..
            </div>
        </div>
	</div> 

	<script type="text/javascript">
		$(document).ready(function(){
			$('#aboutUsForm').on('submit', function(e) {
				e.preventDefault(); 
	            var data=$(this).serialize();
	            	$.ajax({
	           			type: "POST",
	           			url: 'UpdateAboutus',
	           			data:$(this).serialize(),
	           			success: function( msg ) { 
	           				    if (msg=='Done') {
	           				    	$('#SuccessMessage').show();
	           				    } 
	           			}
	       			});
	       		});
	    	});  	
	</script>       				
@endsection
