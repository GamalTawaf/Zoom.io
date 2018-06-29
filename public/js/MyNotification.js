$(document).ready(function(){
$('#ANotification').on('click', function(e) {
      var csrf_token = $('meta[name="csrf-token"]').attr('content');
      var data='&_token='+csrf_token;
        $.ajax({
                type: "POST",
                url: 'OpenNotification',
                data:data,
                success: function( msg ) {
                  
                  
                }
            });
            
});
});