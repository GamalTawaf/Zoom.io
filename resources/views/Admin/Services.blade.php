
@extends ('Admin/MasterAdmin')
@section('content')
  <div class="grids">
    <div class="panel panel-widget forms-panel">
              <div class="forms">
                <div class="form-grids widget-shadow" data-example-id="basic-forms">
                  <div class="form-title">
                    <h3>New Service:</h3>
                  </div>
                  <div class="form-body">

                    {!! Form::open(['id' => 'serviceForm','class' => 'form-horizontal']) !!}    
                      <div class="form-group"> 
                        {!! Form::label('Name', 'Name:',['class'=>'col-sm-2 control-label required-field']) !!}
                        <div class="col-sm-9"> 
                        {!! Form::text('name','',['class'=>'form-control', 'id'=>'name','placeholder'=>'Add a new sevice here..','required']) !!} 
                        </div>
                      </div>   
                         
                      <div class="col-sm-offset-2"> 
                        {!! Form::submit('Add Service',['class'=>'btn btn-primary']) !!}
                      </div>
                    {!! Form::close() !!}

                  </div>
                </div>
                <div class="clearfix"> </div>
            </div>
    </div>
    <div id="WrongMessage">
    </div>

          <div class="panel panel-widget">
            <div class="tables">
              <h4>Services Table:</h4>
              <table class="table table-hover" id="ShowServices"> <thead> <tr><th>  Service</th> <th>Update</th> <th>Delet</th> </tr> </thead> 
              <tbody> 

              @foreach($service as $service)
                  <form  method="post" id="formid_{{$service->id}}" class="form-body">
                  <tr id="myTableRow_{{$service->id}}"> 
                    <th scope="row" >
                      <div id="UpdateShow_{{$service->id}}" >
                       {{$service->name}} 
                      </div>
                      <div id="InputUpdate_{{$service->id}}" style="display: none;">    
                          <input type="text" name="name" id="name_{{$service->id}}" value="{{$service->name}}" class="form-control">
                      </div>
                    </th>   
                    <td>
                        <a href="#">
                        <i class="fa fa-pencil" id="{{$service->id}}" title="update"></i>
                        <i class="fa fa-floppy-o" aria-hidden="true" style="display: none;" id="save_{{$service->id}}" title="save"></i>
                        </a>
                        <input type="hidden" name="id" id="id_{{$service->id}}" value="{{$service->id}}">
                        <input type="hidden" name="_token" id="token_{{$service->id}}"  value="{{ csrf_token() }}">
                    </td> 
                    <td> <a href="#"><i  class="fa fa-trash-o" id="delete_{{$service->id}}" title="delete"></i></a></td> 
                  </tr> 
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
    $('#serviceForm').on('submit', function(e) {
      e.preventDefault(); 
      var name = $('#name').val();
      var data=$(this).serialize();
      $.ajax({
          type: "POST",
          url: 'CreateService',
          data:$(this).serialize(),
          success: function( msg ) {
              if (msg[0]=='Done') { 
                    $('#ShowServices').append('<tr class="bg-info" style1="background-color:#76A0D3" id="myTableRow_'+msg[1]+'" ><form action="EditService" method="post" id="formid_'+msg[1]+'" class="form-body"><th ><div id="UpdateShow_'+msg[1]+'">'+name+'</div><div id="InputUpdate_'+msg[1]+'" style="display: none;"><input type="text" name="name" id="name_'+msg[1]+'" value="'+name+'" class="form-control"></div></th><td><a href=# ><i class="fa fa-pencil" title="update" id='+msg[1]+' ></i><i class="fa fa-floppy-o" title="save" aria-hidden="true" style="display: none;" id="save_'+msg[1]+'"></i></a><input type="hidden" name="id" id="id_'+msg[1]+'" value='+msg[1]+'><input type="hidden" name="_token" id="token_'+msg[1]+'" value="'+msg[2]+'"></td><td><a href="#"><i  class="fa fa-trash-o" title="delete" id="delete_'+msg[1]+'"></i></a></td></form></tr>'); 
                    $('.bg-info').css('backgroundColor','hsl(200,65%,91%');
              var d = 1000;
              for(var i=89; i<=100; i=i+0.1){
                  d  += 10;
                  (function(ii,dd){
                      setTimeout(function(){
                          $('.bg-info').css('backgroundColor','hsl(200,65%,'+ii+'%)'); 
                      }, dd);    
                  })(i,d);
              }
                  }
                  else {
                    //alert( msg ); 
                    $("#WrongMessage").html(msg);
                  } 
                  
                }
            });
        });
        
          //$('.fa-pencil').on('click', function(e) {
        $("#ShowServices tbody").on( "click", ".fa-pencil", function(e) {
            e.preventDefault(); 

              var Id = $(this).attr('id');
              $("#InputUpdate_"+Id).show();
              $("#UpdateShow_"+Id).hide();

              $("#"+Id).hide();
              $("#save_"+Id).show();
            });

              //$('.fa-floppy-o').on('click', function(e) {
        $("#ShowServices tbody ").on( "click", ".fa-floppy-o", function(e) {  
                e.preventDefault(); 
                var str = $(this).attr('id');
                var id = str.split("_");
                var Id=id[1];
                var data = 'id='+$("#id_"+Id).val()+'&name='+$("#name_"+Id).val()+'&_token='+$("#token_"+Id).val();
                $.ajax({
                  type: 'POST',
                  url: 'EditService',
                  data:data,
                  success: function( msg ) {
                    //alert( msg ); 
                    $("#InputUpdate_"+Id).hide();
                    $("#UpdateShow_"+Id).html(msg);
                    $("#UpdateShow_"+Id).show();
                    $("#"+Id).show();
                    $("#save_"+Id).hide();
                }
            });
          });
          
        //$('.fa-trash-o').on('click', function(e) {
        $("#ShowServices tbody").on( "click", ".fa-trash-o", function(e) {  
            e.preventDefault(); 
            var str = $(this).attr('id');
            var id = str.split("_");
            var Id=id[1];

            //var FormId=$('#formid_'+Id).attr('id');
            
            var csrf_token = $('meta[name="csrf-token"]').attr('content');
            var data='id='+Id+'&_token='+csrf_token;
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
                      url: 'DeleteService',
                      data:data,
                      success: function( msg ) {
                        //alert( msg ); 
                        $('#myTableRow_'+Id).slideUp(300,function() {
                          $('#myTableRow_'+Id).remove();
                        });
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

        // prevent form submit on enter
        $(window).keydown(function(event){
          if(event.keyCode == 13) {
          event.preventDefault();
          return false;
          }
        });
   
  });
</script>
        

@endsection


