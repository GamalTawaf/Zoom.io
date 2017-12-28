@extends ('Admin/MasterAdmin')
@section('content')
    <ul id="myList">
        <?php $Flag=0;?>
        @foreach($ContactOpen as $i =>$ContactOpen)
            <li>
                <button class="accordion" id="button_{{$ContactOpen->id}}"> 
                @if( $ContactOpen->status=='1')
                    <b>
                    <div  style="display: inline; float:left;">Name:  {{$ContactOpen->LastName}} {{$ContactOpen->FirstName}}
                        <span class="new" style="color: red;">new</span> 
                    </div> 
                    <div  style="display: inline; float:right;">Phone: {{$ContactOpen->phone}} - Email:  {{$ContactOpen->email}}
                    </div>
                    </b> 
                @endif
                </button>

                <div class="contactpanel">
                    <br><p><b>Subject:</b>
                    @if (!empty($ContactOpen->service->name)) 
                        {{$ContactOpen->service->name}}
                    @else
                        This Service has been deleted
                    @endif
                    </p><br>
                    <p>{{$ContactOpen->message}}</p><br>    
                </div>
            </li>      
        @endforeach
        @foreach($Contact as $i =>$Contact)
            
            <li>
                <button class="accordion" id="button_{{$Contact->id}}"> 
                    @if( $Contact->status=='2')
                        <b><div  style="display: inline; float:left;">Name:  {{$Contact->LastName}} {{$Contact->FirstName}}
                        </div> 
                        <div  style="display: inline; float:right;">Phone: {{$Contact->phone}} - Email:  {{$Contact->email}}</div></b> 
                        @endif
                    @if($Contact->status=='3')
                        <div  style="display: inline; float:left;">Name:  {{$Contact->LastName}} {{$Contact->FirstName}}</div>
                        <div  style="display: inline; float:right;"> Phone: {{$Contact->phone}} - Email:  {{$Contact->email}}</div> 
                    @endif
                </button>
                <div class="contactpanel">
                    <br><p><b>Subject:</b>
                    @if (!empty($Contact->service->name)) 
                        {{$Contact->service->name}}
                    @else
                        This Service has been deleted
                    @endif
                        </p><br><p>{{$Contact->message}}</p>
                    <br>    
                </div>
            </li>
        @endforeach
    </ul>
    @if($Flag>10) 
        <div id="loadMore">Load more...</div>
    @endif

<script type="text/javascript">
$(document).ready(function () {
    $(".new").fadeOut(2000);
    var size_li = $("#myList li").size();
    var x=10;
    $('#myList li:lt('+x+')').show();
    $('#loadMore').click(function () {
        x= (x+10 <= size_li) ? x+10 : size_li;
        $('#myList li:lt('+x+')').show();
        if (x==size_li) {
            $('#loadMore').hide();
        }
    });
    $('.accordion').on('click', function(e) {
        var str = $(this).attr('id');
        var id = str.split("_");
        var Id=id[1];
        var htmltext=$('#'+str).html();
        var text=htmltext.replace('<b>', " ")
        var text=text.replace('</b>', " ")
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        var data='Id='+Id+'&_token='+csrf_token;
            $.ajax({
                        type: "POST",
                        url: 'ReadContact',
                        data:data,
                        success: function( msg ) {
                            $('#'+str).html(text);                    
                        } 
            }); 
        });
    });

    var acc = document.getElementsByClassName("accordion");
    var i;
    for (i = 0; i < acc.length; i++) {
        acc[i].onclick = function(){
        /* Toggle between adding and removing the "active" class,
        to highlight the button that controls the panel */
        this.classList.toggle("active");

        /* Toggle between hiding and showing the active panel */
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
        }
    }
</script>
@endsection