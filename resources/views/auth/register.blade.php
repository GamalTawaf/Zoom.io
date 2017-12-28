@extends ('Admin/MasterAdmin')

@section('content')
    <div class="grids">
        <div class="panel panel-widget forms-panel">
            <div class="forms">
                <div class="form-grids widget-shadow" data-example-id="basic-forms">
                                    <div class="form-title">
                                        <h3>New Admin:</h3>
                                    </div>
                                    <div class="form-body">
                                        <form method="POST" action="/auth/register" id="RegisterForm">
                                            <div class="form-group has-feedback">
                                            {!! csrf_field() !!}

                                            <div>
                                                <b>Name:</b> 
                                                <input type="text" name="name" value="{{ old('name') }}" class="form-control" name="name" required/>
                                            </div>
                                            <br>

                                            <div>
                                                <b>Email:</b> 
                                                <input type="email" name="email" value="{{ old('email') }}" class="form-control" name="name" required/>
                                            </div>
                                            <br>

                                            <div>
                                                <b> Password: </b>
                                                <input type="password" name="password" class="form-control" name="name" required/>
                                            </div>
                                            <br>

                                            <div>
                                                <b>Confirm Password:</b>
                                                <input type="password" name="password_confirmation" class="form-control" name="name" required/>
                                            </div>
                                            </div>


                                            <div class="Add">
                                                <div class="form-group recover-button">
                                                    <button type="submit" class="btn btn-primary ">Register</button>
                                                    
                                                </div>
                                            </div>


                                        </form> 
                                    </div>
                                </div>
                                <div class="clearfix"> </div>
                                </div>
                            </div>

                            <div id="SuccessMessage" style="display: none;">            
                                        <div class="alert alert-success alert-dismissable fade in">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            <strong>Success!</strong> The  Testimonial have been added..
                                        </div>
                            </div>
                        </div>




    <script type="text/javascript">

        $(document).ready(function(){
            $('#RegisterForm').on('submit', function(e) {
                e.preventDefault(); 
                //var name = $('#name').val();
                var data=$(this).serialize();
                alert(data);
                $.ajax({
                    type: "POST",
                    url: '/auth/register',
                    data:data,
                    success: function( msg ) {
                            //alert( msg ); 
                            //console.log(msg);
                            $("#SuccessMessage").show();
                    }
                });
            });
        });
    </script>    
                    
@endsection
