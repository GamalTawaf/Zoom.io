@extends ('Admin/MasterAdmin')

@section('content')
    <div class="grids">
        <div class="panel panel-widget forms-panel">
            <div class="forms">
                <div class="form-grids widget-shadow" data-example-id="basic-forms">
                                    <div class="form-title">
                                        <h3>Update Your Account:</h3>
                                    </div>
                                    <div class="form-body">
                                         
                                        {!! Form::open(['id' => 'UpdateAccount','class' => 'form-horizontal']) !!}        
                                            
                                            <div class="form-group has-feedback">
                                            
                                            {!! Form::hidden('id',"$profile->id",['required']) !!} 

                                             
                                            <div class="form-group"> 
                                                {!! Form::label('Name', 'Name:',['class'=>'col-sm-2 control-label required-field']) !!}
                                                <div class="col-sm-9"> 
                                                {!! Form::text('name',"$profile->name",['class'=>'form-control','required']) !!} 
                                                </div> 
                                            </div>

                                            <div class="form-group"> 
                                                {!! Form::label('email', 'Email:',['class'=>'col-sm-2 control-label required-field']) !!}
                                                <div class="col-sm-9"> 
                                                {!! Form::text('email',"$profile->email",['class'=>'form-control', 'required']) !!} 
                                                </div> 
                                            </div>

                                            <div class="form-group"> 
                                                {!! Form::label('password', 'Password:',['class'=>'col-sm-2 control-label required-field']) !!}
                                                <div class="col-sm-9"> 
                                                <input type="password" id="password" name="password" class="form-control" name="name" required/>
                                                </div> 
                                            </div>
                                            
                                            
                                            <div class="form-group"> 
                                                {!! Form::label('Confirm Password', 'Confirm Password:',['class'=>'col-sm-2 control-label required-field']) !!}
                                                <div class="col-sm-9"> 
                                                <input type="password" name="passwordConfirmation" class="form-control" id="passwordConfirm"  required/>

                                                </div>
                                                 
                                            </div>
                                            
                                            <div class="col-sm-offset-2"> 
                                                {!! Form::submit('Save',['class'=>'btn btn-primary']) !!}
                                            </div> 
                                            </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                                <div class="clearfix"> </div>
                                </div>
                            </div>

                            <div id="SuccessMessage" style="display: none;">            
                                        <div class="alert alert-success alert-dismissable fade in">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong>Success!</strong> Your Account Has Been Updated..
                                        </div>
                            </div>

                            <div id="passwordConfirmDiv" style="display: none;">            
                                        <div class="alert alert-danger alert-dismissable fade in">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong>Wrong!</strong> Password And Confirm Password are not Match..
                                        </div>
                            </div>
                            
                        </div>



<script type="text/javascript">

    $(document).ready(function(){
        $('#UpdateAccount').on('submit', function(e) {
            e.preventDefault(); 
            var data=$(this).serialize();
            //if (document.getElementById('password').value==document.getElementById('passwordConfirm').value) {
            if($("#password").val()==$("#passwordConfirm").val()){  
                $.ajax({
                    type: "POST",
                    url: 'UpdateAccountEdit',
                    data:data,
                    success: function( msg ) {  
                        if(msg=='Done')
                        {
                            $("#SuccessMessage").show();
                            $("#passwordConfirmDiv").hide();
                        }
                            
                    }
                });
            }
            else
            { 
                $("#passwordConfirmDiv").show();
                $("#SuccessMessage").hide();
            }
            
        });

         

        $(window).keydown(function(event){
            if(event.keyCode == 13) {
            event.preventDefault();
            return false;
            }
        });
    });
    </script> 
                    
@endsection
